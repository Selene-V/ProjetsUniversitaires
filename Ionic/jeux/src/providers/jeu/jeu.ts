import { Injectable } from '@angular/core';
import { AngularFirestore } from 'angularfire2/firestore';
import { Observable, Subject } from 'rxjs';
import { map } from 'rxjs/operators';


@Injectable()
export class JeuProvider {

  private jeux: any = [];
  jeuSubject = new Subject<any[]>();

  constructor(
    private db: AngularFirestore
    ) {
      this.getAllJeux();
    }

    // Permet d'envoyer les modifications à tous les composants en train d'utiliser le Subject
    emitJeuSubject(){
      this.jeuSubject.next(this.jeux.slice());
    }

    // Permet de retourner le jeu correspondant à l'id
    getJeuById(id: string){
      for (const jeu of this.jeux) {
        if(jeu.id == id) return jeu;
      }
    }

    // Permet de sauvegarder un nouveau jeu dans la bdd
    saveNewJeu(jeu: any){
      return new Observable( obs => {
        this.db.collection('jeux').add(jeu).then(() => {
          console.log('success');
          obs.next();
        })
      })
    }

    // Permet de retourner tous les jeux de la bdd
    getAllJeux(){
      return this.db.collection('jeux').snapshotChanges().pipe(
        map((changes: any) => {
          return changes.map(doc => {
            return {
              id: doc.payload.doc.id,
              data: doc.payload.doc.data()
            }
          })
        })
      ).subscribe(res => {
        this.jeux = res;
        this.emitJeuSubject();
      })
    }

    // Permet de mettre à jour un jeu dans la bdd
    update(jeu: any, id:any){
      return new Observable(obs => {
        this.db.doc(`jeux/${id}`).update(jeu);
        obs.next();
      })
    }

    // Permet de supprimer un jeu dans la bdd
    delete(id: any){
      this.db.doc(`jeux/${id}`).delete();
    }
}

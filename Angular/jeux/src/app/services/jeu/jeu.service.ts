import { Injectable } from '@angular/core';
import { Observable, Subject } from 'rxjs';

import { AngularFirestore } from 'angularfire2/firestore';
import { map } from "rxjs/operators";

@Injectable({
  providedIn: 'root'
})
export class JeuService {

  constructor(
    private db: AngularFirestore
  ) {
    this.getAllJeux()
  }

  jeuSubject = new Subject<any[]>();

  private jeux = [];

  emitJeuSubject(){
    this.jeuSubject.next(this.jeux.slice());
  }


  getJeuById(id: number){
    for (const jeu of this.jeux){
      if (jeu.id == id){
        return jeu;
      }
    }
  }

  getAllJeux(){
    return this.db.collection('jeux').snapshotChanges().pipe(
      map(changes => {
        return changes.map(doc => {
          return {
            id: doc.payload.doc.id,
            data: doc.payload.doc.data()
          }
        })
      })
    ).subscribe(res => {
      this.jeux = res;
      console.log(res);
      this.emitJeuSubject();
    })
  }

  saveNewJeu(jeu: any){
    return new Observable(obs => {
      this.db.collection('jeux').add(jeu).then(() => {
        console.log('jeu ajouté !');
        obs.next();
      })
    });
  }

  update(jeu: any, id: any){
    return new Observable(obs => {
      this.db.doc(`jeux/${id}`).update(jeu);
      console.log('jeu modifié !');
      obs.next();
    })
  }

  delete(id: any){
    this.db.doc(`jeux/${id}`).delete();
    console.log('jeu supprimé !');
  }

}

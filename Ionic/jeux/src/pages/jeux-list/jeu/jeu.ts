import { Component, OnInit } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController, ToastController } from 'ionic-angular';
import { JeuProvider } from '../../../providers/jeu/jeu';


@IonicPage()
@Component({
  selector: 'page-jeu',
  templateUrl: 'jeu.html',
})

export class JeuPage implements OnInit{
  public modif: boolean = false;
  public title: string;
  public id: string;
  public jeu: any;

  constructor(
    public navCtrl: NavController,
    public navParams: NavParams,
    public alertCtrl: AlertController,
    private Jeu: JeuProvider,
    private Toast: ToastController
    ) {}

    ngOnInit(): void {
      this.title = this.navParams.get('title');
      this.id = this.navParams.get('id');
      this.jeu = this.Jeu.getJeuById(this.id);
    }

    // Creation dune alerte demandant a l'utilisateur sil est sur de vouloir modifier le jeu
    onGoAccessModif(){
      let alert = this.alertCtrl.create({
        title: 'Etes-vous sur de vouloir le modifier ?',
        subTitle: 'Vous rendrez possible la modification',
        buttons: [
          {
            text: "Annuler",
            role: "Cancel"
          },
          {
            text: "Confirmer",
            handler: () => {
              this.modif = !this.modif
            }
          }
        ]
      });
      alert.present();
    }

    // Permet de modifier un jeu
    onModif(){
      this.Jeu.update(this.jeu.data, this.jeu.id).subscribe(() => {
        const toast = this.Toast.create({
          message: 'Vos changements sont sauvegardés',
          duration: 2000
        }).present();
        this.modif = false;
      });
    }

    // Permet de supprimer un jeu
    onDelete(){
      this.Jeu.delete(this.id);
      this.navCtrl.pop();
    }

}

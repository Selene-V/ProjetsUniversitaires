import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { JeuProvider } from '../../../providers/jeu/jeu';

@IonicPage()
@Component({
  selector: 'page-jeu-new',
  templateUrl: 'jeu-new.html',
})
export class JeuNewPage {

  // Initialisation
  public jeu: any = {
    nom: null,
    acquis: false,
    visuel: null,
    pays: null,
    createur: null,
    edition: null,
    date: null,
    resume: null
  };
  
  constructor(
    public navCtrl: NavController,
    public navParams: NavParams,
    private Jeu: JeuProvider
    ) { }

  // Permet de créer un jeu
  onAdd(){
    this.Jeu.saveNewJeu(this.jeu).subscribe(() => {
      this.jeu = {
        nom: null,
        acquis: false,
        visuel: null,
        pays: null,
        createur: null,
        edition: null,
        date: null,
        resume: null
      };
      this.navCtrl.pop();
    })
  }
}

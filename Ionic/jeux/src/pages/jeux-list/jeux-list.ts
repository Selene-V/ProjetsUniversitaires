import { Component, OnInit } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Subscription } from 'rxjs';
import { JeuProvider } from '../../providers/jeu/jeu';
import { JeuNewPage } from './jeu-new/jeu-new';
import { JeuPage } from './jeu/jeu';

@IonicPage()
@Component({
  selector: 'page-jeux-list',
  templateUrl: 'jeux-list.html',
})
export class JeuxListPage implements OnInit {

  public jeux: any = [];
  jeuSubscription: Subscription;
  
  constructor(
    public navCtrl: NavController,
    public navParams: NavParams,
    private Jeu: JeuProvider
    ) { }

    ngOnInit() {
      this.jeuSubscription = this.Jeu.jeuSubject.subscribe((listJeu) => {
        this.jeux = listJeu;
      })
    }

  // Permet d'aller sur la page de creation d'un jeu
  onGoToCreate(){
    this.navCtrl.push(JeuNewPage);
  }

  // Permet d'aller sur la page de detail d'un jeu
  onGoToJeu(jeuNom: string, _id: string){
    this.navCtrl.push(JeuPage, {title: jeuNom, id: _id});
  }

}

import { Component, OnInit } from '@angular/core';
import { Subscription } from 'rxjs';
import { JeuService } from '../services/jeu/jeu.service';

@Component({
  selector: 'app-jeu-list',
  templateUrl: './jeu-list.component.html',
  styleUrls: ['./jeu-list.component.css']
})
export class JeuListComponent implements OnInit {

  jeux: any = [];
  jeuSubscription: Subscription;

  constructor(
    private Jeu: JeuService
  ) { }

  ngOnInit() {
    this.jeuSubscription = this.Jeu.jeuSubject.subscribe((listJeu) => {
      this.jeux = listJeu;
    });
    this.Jeu.emitJeuSubject();
  }

  ngOnDestroy(): void {
    this.jeuSubscription.unsubscribe();
  }

}

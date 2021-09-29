import { Component, OnInit } from '@angular/core';
import { JeuService } from '../services/jeu/jeu.service';

@Component({
  selector: 'app-jeu-new',
  templateUrl: './jeu-new.component.html',
  styleUrls: ['./jeu-new.component.css']
})
export class JeuNewComponent implements OnInit {

  public jeu: any = {
    nom: null,
    acquis: false,
    visuel: null,
    pays: null,
    createur: null,
    edition: null,
    date: null,
    resume: null
  }
  change:boolean;

  constructor(
    private Jeu: JeuService
  ) { }

  ngOnInit() {
    
  }

  add(){
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
      }
      this.change = true;
      setTimeout(() => {
        this.change = false;
      }, 3000);
    })
  }

}

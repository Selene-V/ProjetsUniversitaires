import { Component, OnInit, Input } from '@angular/core';
import { JeuService } from '../services/jeu/jeu.service';

@Component({
  selector: 'app-jeu',
  templateUrl: './jeu.component.html',
  styleUrls: ['./jeu.component.css']
})
export class JeuComponent implements OnInit {

  @Input() jeuNom: string;
  @Input() jeuAcquis:boolean;
  @Input() jeuVisuel: boolean;
  @Input() jeuPays: string;
  @Input() jeuCreateur: string;
  @Input() jeuEdition: string;
  @Input() jeuDate: string;
  @Input() jeuResume: string;

  @Input() index: number;
  @Input() id: number;


  constructor(
    private Jeu: JeuService
  ) { }

  ngOnInit() {
  }

  getJeuAcquis(){
    return this.jeuAcquis;
  }
  
  supr(){
    this.Jeu.delete(this.id);
  }

}

import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { JeuService } from '../services/jeu/jeu.service';

@Component({
  selector: 'app-jeu-modif',
  templateUrl: './jeu-modif.component.html',
  styleUrls: ['./jeu-modif.component.css']
})
export class JeuModifComponent implements OnInit {
  
  jeu:any;
  id:any;
  change:boolean;

  constructor(
    private Jeu: JeuService,
    private route: ActivatedRoute
  ) { }

  ngOnInit() {
    const id = this.route.snapshot.params['id'];
    this.id = this.Jeu.getJeuById(id).id;
    this.jeu = this.Jeu.getJeuById(id).data;
  }
  
  modif(){
    this.Jeu.update(this.jeu, this.id).subscribe(() => {
      this.change = true;
      setTimeout(() => {
        this.change = false;
      }, 3000);
    });
  }

}

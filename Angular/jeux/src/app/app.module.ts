import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { JeuComponent } from './jeu/jeu.component';
import { FormsModule } from '@angular/forms';

import { JeuService } from './services/jeu/jeu.service';
import { HomeComponent } from './home/home.component';
import { JeuListComponent } from './jeu-list/jeu-list.component';
import { JeuModifComponent } from './jeu-modif/jeu-modif.component';
import { JeuNewComponent } from './jeu-new/jeu-new.component';

import { RouterModule, Routes } from '@angular/router';

import { AngularFireModule } from 'angularfire2';
import { AngularFirestoreModule } from 'angularfire2/firestore';
import { environment } from '../environments/environment';

const appRoutes : Routes = [
  {
    path: 'jeux',
    component: JeuListComponent
  },
  {
    path: 'new',
    component: JeuNewComponent
  },
  {
    path: '',
    component: HomeComponent
  },
  {
    path: 'modif/:id',
    component: JeuModifComponent
  },
];


@NgModule({
  declarations: [
    AppComponent,
    JeuComponent,
    HomeComponent,
    JeuListComponent,
    JeuModifComponent,
    JeuNewComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    RouterModule.forRoot(appRoutes),
    AngularFireModule.initializeApp(environment.firebase),
    AngularFirestoreModule
  ],
  providers: [
    JeuService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }

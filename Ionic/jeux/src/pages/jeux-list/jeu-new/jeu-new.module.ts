import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { JeuNewPage } from './jeu-new';

@NgModule({
  declarations: [
    JeuNewPage,
  ],
  imports: [
    IonicPageModule.forChild(JeuNewPage),
  ],
})
export class JeuNewPageModule {}

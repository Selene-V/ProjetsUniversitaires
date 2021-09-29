import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { JeuxListPage } from './jeux-list';

@NgModule({
  declarations: [
    JeuxListPage,
  ],
  imports: [
    IonicPageModule.forChild(JeuxListPage),
  ],
})
export class JeuxListPageModule {}

import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { AboutPage } from '../about/about';
import { HomePage } from '../home/home';
import { JeuxListPage } from '../jeux-list/jeux-list';
import { PhotosPage } from '../photos/photos';

/**
 * Generated class for the TabPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-tab',
  templateUrl: 'tab.html',
})
export class TabPage {
  home = HomePage;
  jeux = JeuxListPage;
  about = AboutPage;
  photos = PhotosPage;
  
  constructor(
    public navCtrl: NavController, 
    public navParams: NavParams
    ) { }

}

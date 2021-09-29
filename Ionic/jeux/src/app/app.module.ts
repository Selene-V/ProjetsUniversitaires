import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { SplashScreen } from '@ionic-native/splash-screen';
import { StatusBar } from '@ionic-native/status-bar';

import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { JeuxListPageModule } from '../pages/jeux-list/jeux-list.module';
import { TabPageModule } from '../pages/tab/tab.module';
import { AboutPageModule } from '../pages/about/about.module';
import { JeuNewPageModule } from '../pages/jeux-list/jeu-new/jeu-new.module';
import { JeuPageModule } from '../pages/jeux-list/jeu/jeu.module';
import { JeuProvider } from '../providers/jeu/jeu';
import { AngularFireModule } from 'angularfire2';
import { AngularFirestoreModule } from 'angularfire2/firestore';
import { PhotosPageModule } from '../pages/photos/photos.module';
import { Camera } from '@ionic-native/camera';

// Parametres de connexion à firebase
const firebase = {
  apiKey: "AIzaSyCJi0y0P1KTxajikLwhiRz1kSdf6QAn1Mw",
  authDomain: "jeux-angular.firebaseapp.com",
  projectId: "jeux-angular",
  storageBucket: "jeux-angular.appspot.com",
  messagingSenderId: "917996197008",
  appId: "1:917996197008:web:c2f0757ffb116461a83415"
};

@NgModule({
  declarations: [
    MyApp,
    HomePage
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp),
    JeuxListPageModule,
    AboutPageModule,
    JeuNewPageModule,
    JeuPageModule,
    TabPageModule,
    PhotosPageModule,
    AngularFireModule.initializeApp(firebase),
    AngularFirestoreModule
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    JeuProvider,
    Camera
  ]
})
export class AppModule {}

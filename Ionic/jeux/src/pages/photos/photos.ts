import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController, normalizeURL } from 'ionic-angular';
import { Camera, CameraOptions } from "@ionic-native/camera";

@IonicPage()
@Component({
  selector: 'page-photos',
  templateUrl: 'photos.html',
})
export class PhotosPage {
  imgUrl: any;

  options: CameraOptions = {
    quality: 100,
    destinationType: this.Camera.DestinationType.DATA_URL,
    encodingType: this.Camera.EncodingType.JPEG,
    mediaType: this.Camera.MediaType.PICTURE,
    cameraDirection: 0
  };

  constructor(
    public navCtrl: NavController,
    public navParams: NavParams,
    private Camera: Camera,
    private Toast: ToastController
    ) { }

    // Permet d'utiliser la fonctionnalité camera ou d'afficher un toast en cas d'erreur
    onPicture(){
      this.Camera.getPicture(this.options)
      .then((data) => {
        if(data) this.imgUrl = normalizeURL(data);
      })
      .catch((err) => {
        this.Toast.create({
          message: err,
          duration: 3000,
          position: 'bottom'
        }).present();
      });
    }
}

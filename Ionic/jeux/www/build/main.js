webpackJsonp([0],{

/***/ 208:
/***/ (function(module, exports) {

function webpackEmptyAsyncContext(req) {
	// Here Promise.resolve().then() is used instead of new Promise() to prevent
	// uncatched exception popping up in devtools
	return Promise.resolve().then(function() {
		throw new Error("Cannot find module '" + req + "'.");
	});
}
webpackEmptyAsyncContext.keys = function() { return []; };
webpackEmptyAsyncContext.resolve = webpackEmptyAsyncContext;
module.exports = webpackEmptyAsyncContext;
webpackEmptyAsyncContext.id = 208;

/***/ }),

/***/ 253:
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"../pages/about/about.module": [
		254
	],
	"../pages/jeux-list/jeu-new/jeu-new.module": [
		367
	],
	"../pages/jeux-list/jeu/jeu.module": [
		256
	],
	"../pages/jeux-list/jeux-list.module": [
		376
	],
	"../pages/photos/photos.module": [
		377
	],
	"../pages/tab/tab.module": [
		369
	]
};
function webpackAsyncContext(req) {
	var ids = map[req];
	if(!ids)
		return Promise.reject(new Error("Cannot find module '" + req + "'."));
	return Promise.all(ids.slice(1).map(__webpack_require__.e)).then(function() {
		return __webpack_require__(ids[0]);
	});
};
webpackAsyncContext.keys = function webpackAsyncContextKeys() {
	return Object.keys(map);
};
webpackAsyncContext.id = 253;
module.exports = webpackAsyncContext;

/***/ }),

/***/ 254:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AboutPageModule", function() { return AboutPageModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(24);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__about__ = __webpack_require__(255);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var AboutPageModule = /** @class */ (function () {
    function AboutPageModule() {
    }
    AboutPageModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["I" /* NgModule */])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_2__about__["a" /* AboutPage */],
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["e" /* IonicPageModule */].forChild(__WEBPACK_IMPORTED_MODULE_2__about__["a" /* AboutPage */]),
            ],
        })
    ], AboutPageModule);
    return AboutPageModule;
}());

//# sourceMappingURL=about.module.js.map

/***/ }),

/***/ 255:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AboutPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(24);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


/**
 * Generated class for the AboutPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var AboutPage = /** @class */ (function () {
    function AboutPage(navCtrl, navParams) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
    }
    AboutPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-about',template:/*ion-inline-start:"C:\xampp\htdocs\Ionic\jeux\src\pages\about\about.html"*/'<ion-header>\n  <ion-navbar>\n    <ion-title>A propos</ion-title>\n  </ion-navbar>\n</ion-header>\n\n<ion-content padding>\n  <h1>Pourquoi les jeux de rôles ?</h1>\n  <ion-grid>\n    <ion-row>\n      <ion-col size="12">\n        <img class="imgHaut" src="https://www.numerama.com/wp-content/uploads/2020/03/role-playing-game-2536016_1920.jpg" alt="Dés jeux de rôles">\n      </ion-col>\n    </ion-row>\n    <ion-row>\n      <ion-col size="12">\n        <p>\n          Les jeux de rôles... Thème fort sympatique ! En effet, j\'ai choisi ce thème car j\'adore ce genre de jeux. Il m\'arrive souvent de me retrouver avec plusieurs potes autour d\'une table blindée de malbouffe pour passer des heures et des heures à faire des jeux.\n          Ca peut être des jeux de rôles, des jeux de sociétés, des jeux de cartes ou encore des jeux experts, tant qu\'on s\'amuse !\n        </p>\n      </ion-col>\n    </ion-row>\n    <ion-row>\n      <ion-col>\n        <h1>Quelques jeux de société sympa :</h1>\n      </ion-col>\n    </ion-row>\n    <ion-row>\n      <ion-col>\n        <h2>Munchkin</h2>\n      </ion-col>\n    </ion-row>\n    <ion-row>\n      <ion-col size="3">\n        <img src="https://images-na.ssl-images-amazon.com/images/I/51vcdk0ID7L._AC_.jpg" alt="Munchkin">\n      </ion-col>\n      <ion-col size="9">\n      <p>\n        Trucidez les monstres, étrillez les dragons, sauvez les princesses... mais surtout explorez chaque pièce du donjon. Munchkin est un jeu pour les aventuriers amoureux de la castagne !\n      </p>\n    </ion-col>\n  </ion-row>\n  <ion-row>\n    <ion-col>\n      <h2>Würm</h2>\n    </ion-col>\n  </ion-row>\n  <ion-row>\n    <ion-col size="9">\n    <p>\n      Würm est un jeu de rôle vous entraînant dans la préhistoire et vous proposant d\'incarner un personnage appartenant à l\'une des deux espèces humaines qui se partagent ce monde préhistorique dangereux et inexploré.\n    </p>\n    </ion-col>\n    <ion-col size="3">\n      <img src="https://www.agorajeux.com/20528/wurm.jpg" alt="Würm">\n    </ion-col>\n  </ion-row>\n  <ion-row>\n    <ion-col>\n      <h2>Glorantha : La Guerre des Dieux (expert)</h2>\n    </ion-col>\n  </ion-row>\n  <ion-row>\n    <ion-col size="3">\n      <img src="https://3des.bzh/wp-content/uploads/2020/12/glorantha-the-gods-war.jpg" alt="Glorantha">\n    </ion-col>\n    <ion-col size="9">\n      <p>\n        Glorantha : The Gods War est un jeu de stratégie prenant place dans un univers au bord du désastre. Vous y prendrez le rôle de puissantes factions élémentaires, luttant pour déterminer le destin du cosmos.\n      </p>\n    </ion-col>\n  </ion-row>\n  <ion-row>\n    <ion-col>\n      <h2>The Game Extreme</h2>\n    </ion-col>\n  </ion-row>\n  <ion-row>\n    <ion-col size="9">\n      <p>\n        Tous les joueurs ensemble doivent parvenir à poser toutes les cartes sur 4 piles: 2 ascendantes, 2 descendantes. Pour les aider dans cette tâche, on peut faire des sauts en arrière de 10. Mais cela suffira-t-il pour vaincre le jeu, sachant que l\'on ne peut communiquer la valeur de ses cartes en main ?\n\n        Certaines cartes portent maintenant des consignes qu\'il faut respecter et qui bouleversent les règles habituelles, tel se taire, ou jouer toutes ses cartes sur la même pile.\n      </p>\n    </ion-col>\n    <ion-col size="3">\n      <img src="https://www.espritjeu.com/upload/image/the-game-extreme-p-image-60073-grande.jpg" alt="The Game Extreme">\n    </ion-col>\n  </ion-row>\n  <ion-row>\n    <ion-col>\n      <h2>Robinson Crusoé - Aventures sur l\'île Maudite (expert)</h2>\n    </ion-col>\n  </ion-row>\n  <ion-row>\n    <ion-col size="3">\n      <img src="https://cdn3.philibertnet.com/389955-large_default/robinson-crusoe-aventures-sur-l-ile-maudite.jpg" alt="Robinson Crusoé">\n    </ion-col>\n    <ion-col size="9">\n      <p>\n        Dans Robinson Crusoé, vous et vos amis, incarnez des naufragés sur une île déserte. Construisez un abri, préservez-vous de mille et un dangers et accomplissez les missions proposées !\n      </p>\n    </ion-col>\n  </ion-row>\n</ion-grid>\n</ion-content>\n'/*ion-inline-end:"C:\xampp\htdocs\Ionic\jeux\src\pages\about\about.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["f" /* NavController */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["g" /* NavParams */]])
    ], AboutPage);
    return AboutPage;
}());

//# sourceMappingURL=about.js.map

/***/ }),

/***/ 256:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "JeuPageModule", function() { return JeuPageModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(24);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__jeu__ = __webpack_require__(257);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var JeuPageModule = /** @class */ (function () {
    function JeuPageModule() {
    }
    JeuPageModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["I" /* NgModule */])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_2__jeu__["a" /* JeuPage */],
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["e" /* IonicPageModule */].forChild(__WEBPACK_IMPORTED_MODULE_2__jeu__["a" /* JeuPage */]),
            ],
        })
    ], JeuPageModule);
    return JeuPageModule;
}());

//# sourceMappingURL=jeu.module.js.map

/***/ }),

/***/ 257:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return JeuPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(24);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__providers_jeu_jeu__ = __webpack_require__(95);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var JeuPage = /** @class */ (function () {
    function JeuPage(navCtrl, navParams, alertCtrl, Jeu, Toast) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.alertCtrl = alertCtrl;
        this.Jeu = Jeu;
        this.Toast = Toast;
        this.modif = false;
    }
    JeuPage.prototype.ngOnInit = function () {
        this.title = this.navParams.get('title');
        this.id = this.navParams.get('id');
        this.jeu = this.Jeu.getJeuById(this.id);
    };
    // Creation dune alerte demandant a l'utilisateur sil est sur de vouloir modifier le jeu
    JeuPage.prototype.onGoAccessModif = function () {
        var _this = this;
        var alert = this.alertCtrl.create({
            title: 'Etes-vous sur de vouloir le modifier ?',
            subTitle: 'Vous rendrez possible la modification',
            buttons: [
                {
                    text: "Annuler",
                    role: "Cancel"
                },
                {
                    text: "Confirmer",
                    handler: function () {
                        _this.modif = !_this.modif;
                    }
                }
            ]
        });
        alert.present();
    };
    // Permet de modifier un jeu
    JeuPage.prototype.onModif = function () {
        var _this = this;
        this.Jeu.update(this.jeu.data, this.jeu.id).subscribe(function () {
            var toast = _this.Toast.create({
                message: 'Vos changements sont sauvegardés',
                duration: 2000
            }).present();
            _this.modif = false;
        });
    };
    // Permet de supprimer un jeu
    JeuPage.prototype.onDelete = function () {
        this.Jeu.delete(this.id);
        this.navCtrl.pop();
    };
    JeuPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-jeu',template:/*ion-inline-start:"C:\xampp\htdocs\Ionic\jeux\src\pages\jeux-list\jeu\jeu.html"*/'<ion-header>\n  <ion-navbar>\n    <ion-title>{{jeu.data.nom}}</ion-title>\n  </ion-navbar>\n</ion-header>\n\n<ion-content padding>\n  <button ion-button (click)="onGoAccessModif()">Rendre Modifiable</button>\n  <!-- <div *ngIf="!modif">\n    J\'affiche le détail\n  </div>\n  <div *ngIf="modif">\n    Je peux modifier\n  </div> -->\n\n  <div *ngIf="modif; then content else otherContent"></div>\n  <ng-template #content>\n    <ion-item>\n      <ion-label>Visuel</ion-label>\n      <ion-input type="text" [(ngModel)]="jeu.data.visuel"></ion-input>\n    </ion-item>\n    <ion-item>\n      <ion-label>Nom</ion-label>\n      <ion-input type="text" [(ngModel)]="jeu.data.nom"></ion-input>\n    </ion-item>\n    <ion-item>\n      <ion-label>Pays</ion-label>\n      <ion-input type="text" [(ngModel)]="jeu.data.pays"></ion-input>\n    </ion-item>\n    <ion-item>\n      <ion-label>Créateur</ion-label>\n      <ion-input type="text" [(ngModel)]="jeu.data.createur"></ion-input>\n    </ion-item>\n    <ion-item>\n      <ion-label>Edition</ion-label>\n      <ion-input type="text" [(ngModel)]="jeu.data.edition"></ion-input>\n    </ion-item>\n    <ion-item>\n      <ion-label>Date de sortie</ion-label>\n      <ion-input type="text" [(ngModel)]="jeu.data.date"></ion-input>\n    </ion-item>\n    <ion-item>\n      <ion-label>Aquis ?</ion-label>\n      <ion-toggle [(ngModel)]="jeu.data.aquis"></ion-toggle>\n    </ion-item>\n    <ion-item>\n      <ion-label>Résumé</ion-label>\n      <ion-textarea rows="20" [(ngModel)]="jeu.data.resume"></ion-textarea>\n    </ion-item>\n    <br>\n    <div class="text-center">\n      <button ion-button (click)="onModif()">Modifier</button>\n    </div>\n  </ng-template>\n  <ng-template #otherContent>\n    <ion-grid *ngIf="jeu">\n      <ion-row>\n        <ion-col col-6>\n          <strong>Aquis :</strong>\n          <ion-icon *ngIf="jeu.data.aquis" name="checkmark"></ion-icon>\n          <ion-icon *ngIf="!jeu.data.aquis" name="close-circle"></ion-icon>\n        </ion-col>\n        <ion-col col-6>\n          <button ion-button (click)="onDelete()">\n            <ion-icon name="trash"></ion-icon>\n          </button>\n        </ion-col>\n      </ion-row>\n      <ion-row>\n        <ion-col col-6>\n          <img [src]="jeu.data.visuel" [alt]="jeu.data.nom">\n        </ion-col>\n        <ion-col col-6>\n          <strong>Nom :</strong> <br>\n          {{jeu.data.nom}} <br>\n          <strong>Pays :</strong><br>\n          {{jeu.data.pays}} <br>\n          <strong>Créateur :</strong> <br>\n          {{jeu.data.createur}} <br>\n          <strong>Edition :</strong> <br>\n          {{jeu.data.edition}} <br>\n          <strong>Visuel :</strong> <br>\n          {{jeu.data.visuel}} <br>\n          <strong>Date de sortie :</strong> <br>\n          {{jeu.data.date}}<br>\n        </ion-col>\n      </ion-row>\n      <ion-row>\n        <ion-col col-12>\n          <strong>Résumé :</strong>\n          <p class="text-justify">\n            {{jeu.data.resume}}\n          </p>\n        </ion-col>\n      </ion-row>\n    </ion-grid>\n  </ng-template>\n</ion-content>\n'/*ion-inline-end:"C:\xampp\htdocs\Ionic\jeux\src\pages\jeux-list\jeu\jeu.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["f" /* NavController */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["g" /* NavParams */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["a" /* AlertController */],
            __WEBPACK_IMPORTED_MODULE_2__providers_jeu_jeu__["a" /* JeuProvider */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* ToastController */]])
    ], JeuPage);
    return JeuPage;
}());

//# sourceMappingURL=jeu.js.map

/***/ }),

/***/ 367:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "JeuNewPageModule", function() { return JeuNewPageModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(24);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__jeu_new__ = __webpack_require__(368);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var JeuNewPageModule = /** @class */ (function () {
    function JeuNewPageModule() {
    }
    JeuNewPageModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["I" /* NgModule */])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_2__jeu_new__["a" /* JeuNewPage */],
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["e" /* IonicPageModule */].forChild(__WEBPACK_IMPORTED_MODULE_2__jeu_new__["a" /* JeuNewPage */]),
            ],
        })
    ], JeuNewPageModule);
    return JeuNewPageModule;
}());

//# sourceMappingURL=jeu-new.module.js.map

/***/ }),

/***/ 368:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return JeuNewPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(24);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__providers_jeu_jeu__ = __webpack_require__(95);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var JeuNewPage = /** @class */ (function () {
    function JeuNewPage(navCtrl, navParams, Jeu) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.Jeu = Jeu;
        // Initialisation
        this.jeu = {
            nom: null,
            acquis: false,
            visuel: null,
            pays: null,
            createur: null,
            edition: null,
            date: null,
            resume: null
        };
    }
    // Permet de créer un jeu
    JeuNewPage.prototype.onAdd = function () {
        var _this = this;
        this.Jeu.saveNewJeu(this.jeu).subscribe(function () {
            _this.jeu = {
                nom: null,
                acquis: false,
                visuel: null,
                pays: null,
                createur: null,
                edition: null,
                date: null,
                resume: null
            };
            _this.navCtrl.pop();
        });
    };
    JeuNewPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-jeu-new',template:/*ion-inline-start:"C:\xampp\htdocs\Ionic\jeux\src\pages\jeux-list\jeu-new\jeu-new.html"*/'<ion-header>\n  <ion-navbar>\n    <ion-title>Création d\'un jeu</ion-title>\n  </ion-navbar>\n</ion-header>\n\n<ion-content padding>\n  <ion-item>\n    <ion-label>Visuel</ion-label>\n    <ion-input type="text" [(ngModel)]="jeu.visuel"></ion-input>\n  </ion-item>\n  <ion-item>\n    <ion-label>Nom</ion-label>\n    <ion-input type="text" [(ngModel)]="jeu.nom"></ion-input>\n  </ion-item>\n  <ion-item>\n    <ion-label>Pays</ion-label>\n    <ion-input type="text" [(ngModel)]="jeu.pays"></ion-input>\n  </ion-item>\n  <ion-item>\n    <ion-label>Créateur</ion-label>\n    <ion-input type="text" [(ngModel)]="jeu.createur"></ion-input>\n  </ion-item>\n  <ion-item>\n    <ion-label>Edition</ion-label>\n    <ion-input type="text" [(ngModel)]="jeu.edition"></ion-input>\n  </ion-item>\n  <ion-item>\n    <ion-label>Date</ion-label>\n    <ion-input type="text" [(ngModel)]="jeu.date"></ion-input>\n  </ion-item>\n  <ion-item>\n    <ion-label>Aquis ?</ion-label>\n    <ion-toggle [(ngModel)]="jeu.aquis"></ion-toggle>\n  </ion-item>\n  <ion-item>\n    <ion-label>Résumé</ion-label>\n    <ion-textarea rows="20" [(ngModel)]="jeu.resume"></ion-textarea>\n  </ion-item>\n  <br>\n  <div class="text-center">\n    <button ion-button (click)="onAdd()">Enregistrer</button>\n  </div>\n</ion-content>\n'/*ion-inline-end:"C:\xampp\htdocs\Ionic\jeux\src\pages\jeux-list\jeu-new\jeu-new.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["f" /* NavController */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["g" /* NavParams */],
            __WEBPACK_IMPORTED_MODULE_2__providers_jeu_jeu__["a" /* JeuProvider */]])
    ], JeuNewPage);
    return JeuNewPage;
}());

//# sourceMappingURL=jeu-new.js.map

/***/ }),

/***/ 369:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "TabPageModule", function() { return TabPageModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(24);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__tab__ = __webpack_require__(370);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var TabPageModule = /** @class */ (function () {
    function TabPageModule() {
    }
    TabPageModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["I" /* NgModule */])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_2__tab__["a" /* TabPage */],
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["e" /* IonicPageModule */].forChild(__WEBPACK_IMPORTED_MODULE_2__tab__["a" /* TabPage */]),
            ],
        })
    ], TabPageModule);
    return TabPageModule;
}());

//# sourceMappingURL=tab.module.js.map

/***/ }),

/***/ 370:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return TabPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(24);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__about_about__ = __webpack_require__(255);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__home_home__ = __webpack_require__(371);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__jeux_list_jeux_list__ = __webpack_require__(372);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__photos_photos__ = __webpack_require__(373);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};






/**
 * Generated class for the TabPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var TabPage = /** @class */ (function () {
    function TabPage(navCtrl, navParams) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.home = __WEBPACK_IMPORTED_MODULE_3__home_home__["a" /* HomePage */];
        this.jeux = __WEBPACK_IMPORTED_MODULE_4__jeux_list_jeux_list__["a" /* JeuxListPage */];
        this.about = __WEBPACK_IMPORTED_MODULE_2__about_about__["a" /* AboutPage */];
        this.photos = __WEBPACK_IMPORTED_MODULE_5__photos_photos__["a" /* PhotosPage */];
    }
    TabPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-tab',template:/*ion-inline-start:"C:\xampp\htdocs\Ionic\jeux\src\pages\tab\tab.html"*/'<ion-tabs>\n  <ion-tab [root]="home" tabTitle="Home" tabIcon="home"></ion-tab>\n  <ion-tab [root]="jeux" tabTitle="Jeux" tabIcon="book"></ion-tab>\n  <ion-tab [root]="about" tabTitle="A propos" tabIcon="menu"></ion-tab>\n  <ion-tab [root]="photos" tabTitle="Photos" tabIcon="camera"></ion-tab>\n</ion-tabs>'/*ion-inline-end:"C:\xampp\htdocs\Ionic\jeux\src\pages\tab\tab.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["f" /* NavController */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["g" /* NavParams */]])
    ], TabPage);
    return TabPage;
}());

//# sourceMappingURL=tab.js.map

/***/ }),

/***/ 371:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return HomePage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(24);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var HomePage = /** @class */ (function () {
    function HomePage(navCtrl) {
        this.navCtrl = navCtrl;
    }
    HomePage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-home',template:/*ion-inline-start:"C:\xampp\htdocs\Ionic\jeux\src\pages\home\home.html"*/'<ion-header>\n  <ion-navbar>\n    <ion-title>\n      Mon appli JDR\n    </ion-title>\n  </ion-navbar>\n</ion-header>\n\n<ion-content padding>\n  <p>\n    Bienvenue sur la page d\'accueil du projet de Sélène VIOLA.\n  </p>\n  <p>\n    Dans cette WebApp, nous avons appris à réaliser un CRUD  (Create,\n    Read, Update et Delete) avec Angular et Ionic. Pour ce faire j\'ai choisi le sujet des jeux de rôles!\n  </p>\n  <img src="http://lesyeuxdanslesjeux.com/wp-content/uploads/2019/01/Partie-de-jdr-Dessin-2.jpg" alt="Jeu de rôles">\n</ion-content>\n'/*ion-inline-end:"C:\xampp\htdocs\Ionic\jeux\src\pages\home\home.html"*/
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["f" /* NavController */]])
    ], HomePage);
    return HomePage;
}());

//# sourceMappingURL=home.js.map

/***/ }),

/***/ 372:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return JeuxListPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(24);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__providers_jeu_jeu__ = __webpack_require__(95);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__jeu_new_jeu_new__ = __webpack_require__(368);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__jeu_jeu__ = __webpack_require__(257);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var JeuxListPage = /** @class */ (function () {
    function JeuxListPage(navCtrl, navParams, Jeu) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.Jeu = Jeu;
        this.jeux = [];
    }
    JeuxListPage.prototype.ngOnInit = function () {
        var _this = this;
        this.jeuSubscription = this.Jeu.jeuSubject.subscribe(function (listJeu) {
            _this.jeux = listJeu;
        });
    };
    // Permet d'aller sur la page de creation d'un jeu
    JeuxListPage.prototype.onGoToCreate = function () {
        this.navCtrl.push(__WEBPACK_IMPORTED_MODULE_3__jeu_new_jeu_new__["a" /* JeuNewPage */]);
    };
    // Permet d'aller sur la page de detail d'un jeu
    JeuxListPage.prototype.onGoToJeu = function (jeuNom, _id) {
        this.navCtrl.push(__WEBPACK_IMPORTED_MODULE_4__jeu_jeu__["a" /* JeuPage */], { title: jeuNom, id: _id });
    };
    JeuxListPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-jeux-list',template:/*ion-inline-start:"C:\xampp\htdocs\Ionic\jeux\src\pages\jeux-list\jeux-list.html"*/'<ion-header>\n  <ion-navbar>\n    <ion-title>Liste des jeux</ion-title>\n  </ion-navbar>\n</ion-header>\n\n<ion-content padding>\n  <h2>Création d\'un nouveau jeu</h2>\n  <div class="text-center">\n    <button ion-button (click)="onGoToCreate()">Création</button>\n  </div>\n    <h2>Liste des jeux</h2>\n  <ion-grid>\n    <ion-row>\n      <ion-col col-4 *ngFor="let jeu of jeux">\n        <ion-list (click)="onGoToJeu(jeu.data.nom, jeu.id)">\n          <ion-item>\n            <img [src]="jeu.data.visuel" [alt]="jeu.data.nom">\n          </ion-item>\n          <ion-item>\n            {{jeu.data.nom}}\n          </ion-item>\n        </ion-list>\n      </ion-col>\n    </ion-row>\n  </ion-grid>\n</ion-content>\n'/*ion-inline-end:"C:\xampp\htdocs\Ionic\jeux\src\pages\jeux-list\jeux-list.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["f" /* NavController */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["g" /* NavParams */],
            __WEBPACK_IMPORTED_MODULE_2__providers_jeu_jeu__["a" /* JeuProvider */]])
    ], JeuxListPage);
    return JeuxListPage;
}());

//# sourceMappingURL=jeux-list.js.map

/***/ }),

/***/ 373:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return PhotosPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(24);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__ionic_native_camera__ = __webpack_require__(374);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var PhotosPage = /** @class */ (function () {
    function PhotosPage(navCtrl, navParams, Camera, Toast) {
        this.navCtrl = navCtrl;
        this.navParams = navParams;
        this.Camera = Camera;
        this.Toast = Toast;
        this.options = {
            quality: 100,
            destinationType: this.Camera.DestinationType.DATA_URL,
            encodingType: this.Camera.EncodingType.JPEG,
            mediaType: this.Camera.MediaType.PICTURE,
            cameraDirection: 0
        };
    }
    // Permet d'utiliser la fonctionnalité camera ou d'afficher un toast en cas d'erreur
    PhotosPage.prototype.onPicture = function () {
        var _this = this;
        this.Camera.getPicture(this.options)
            .then(function (data) {
            if (data)
                _this.imgUrl = Object(__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["j" /* normalizeURL */])(data);
        })
            .catch(function (err) {
            _this.Toast.create({
                message: err,
                duration: 3000,
                position: 'bottom'
            }).present();
        });
    };
    PhotosPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-photos',template:/*ion-inline-start:"C:\xampp\htdocs\Ionic\jeux\src\pages\photos\photos.html"*/'<!--\n  Generated template for the PhotosPage page.\n\n  See http://ionicframework.com/docs/components/#navigation for more info on\n  Ionic pages and navigation.\n-->\n<ion-header>\n  <ion-navbar>\n    <ion-title>Photos</ion-title>\n  </ion-navbar>\n</ion-header>\n\n<ion-content padding>\n  <h1>A vous de jouer !</h1>\n  <p>\n    Montrez-nous vos parties endiablées en téléchargeant vos photos sur notre appli ! \n  </p>\n  <p>:)</p>\n  <img *ngIf="imgUrl" [src]="imgUrl">\n  <button ion-button round icon-only (click)="onPicture()">\n    <ion-icon name="camera"></ion-icon>\n  </button>\n</ion-content>\n'/*ion-inline-end:"C:\xampp\htdocs\Ionic\jeux\src\pages\photos\photos.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["f" /* NavController */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["g" /* NavParams */],
            __WEBPACK_IMPORTED_MODULE_2__ionic_native_camera__["a" /* Camera */],
            __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["i" /* ToastController */]])
    ], PhotosPage);
    return PhotosPage;
}());

//# sourceMappingURL=photos.js.map

/***/ }),

/***/ 376:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "JeuxListPageModule", function() { return JeuxListPageModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(24);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__jeux_list__ = __webpack_require__(372);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var JeuxListPageModule = /** @class */ (function () {
    function JeuxListPageModule() {
    }
    JeuxListPageModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["I" /* NgModule */])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_2__jeux_list__["a" /* JeuxListPage */],
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["e" /* IonicPageModule */].forChild(__WEBPACK_IMPORTED_MODULE_2__jeux_list__["a" /* JeuxListPage */]),
            ],
        })
    ], JeuxListPageModule);
    return JeuxListPageModule;
}());

//# sourceMappingURL=jeux-list.module.js.map

/***/ }),

/***/ 377:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PhotosPageModule", function() { return PhotosPageModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(24);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__photos__ = __webpack_require__(373);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var PhotosPageModule = /** @class */ (function () {
    function PhotosPageModule() {
    }
    PhotosPageModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["I" /* NgModule */])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_2__photos__["a" /* PhotosPage */],
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["e" /* IonicPageModule */].forChild(__WEBPACK_IMPORTED_MODULE_2__photos__["a" /* PhotosPage */]),
            ],
        })
    ], PhotosPageModule);
    return PhotosPageModule;
}());

//# sourceMappingURL=photos.module.js.map

/***/ }),

/***/ 419:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser_dynamic__ = __webpack_require__(420);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__app_module__ = __webpack_require__(424);


Object(__WEBPACK_IMPORTED_MODULE_0__angular_platform_browser_dynamic__["a" /* platformBrowserDynamic */])().bootstrapModule(__WEBPACK_IMPORTED_MODULE_1__app_module__["a" /* AppModule */]);
//# sourceMappingURL=main.js.map

/***/ }),

/***/ 424:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__ = __webpack_require__(56);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_ionic_angular__ = __webpack_require__(24);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__ionic_native_splash_screen__ = __webpack_require__(417);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__ionic_native_status_bar__ = __webpack_require__(418);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__app_component__ = __webpack_require__(804);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__pages_home_home__ = __webpack_require__(371);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__pages_jeux_list_jeux_list_module__ = __webpack_require__(376);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__pages_tab_tab_module__ = __webpack_require__(369);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__pages_about_about_module__ = __webpack_require__(254);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__pages_jeux_list_jeu_new_jeu_new_module__ = __webpack_require__(367);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__pages_jeux_list_jeu_jeu_module__ = __webpack_require__(256);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__providers_jeu_jeu__ = __webpack_require__(95);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_13_angularfire2__ = __webpack_require__(103);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_14_angularfire2_firestore__ = __webpack_require__(258);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_15__pages_photos_photos_module__ = __webpack_require__(377);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_16__ionic_native_camera__ = __webpack_require__(374);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};

















// Parametres de connexion à firebase
var firebase = {
    apiKey: "AIzaSyCJi0y0P1KTxajikLwhiRz1kSdf6QAn1Mw",
    authDomain: "jeux-angular.firebaseapp.com",
    projectId: "jeux-angular",
    storageBucket: "jeux-angular.appspot.com",
    messagingSenderId: "917996197008",
    appId: "1:917996197008:web:c2f0757ffb116461a83415"
};
var AppModule = /** @class */ (function () {
    function AppModule() {
    }
    AppModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["I" /* NgModule */])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_5__app_component__["a" /* MyApp */],
                __WEBPACK_IMPORTED_MODULE_6__pages_home_home__["a" /* HomePage */]
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__["a" /* BrowserModule */],
                __WEBPACK_IMPORTED_MODULE_2_ionic_angular__["d" /* IonicModule */].forRoot(__WEBPACK_IMPORTED_MODULE_5__app_component__["a" /* MyApp */], {}, {
                    links: [
                        { loadChildren: '../pages/about/about.module#AboutPageModule', name: 'AboutPage', segment: 'about', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/jeux-list/jeu/jeu.module#JeuPageModule', name: 'JeuPage', segment: 'jeu', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/jeux-list/jeu-new/jeu-new.module#JeuNewPageModule', name: 'JeuNewPage', segment: 'jeu-new', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/tab/tab.module#TabPageModule', name: 'TabPage', segment: 'tab', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/jeux-list/jeux-list.module#JeuxListPageModule', name: 'JeuxListPage', segment: 'jeux-list', priority: 'low', defaultHistory: [] },
                        { loadChildren: '../pages/photos/photos.module#PhotosPageModule', name: 'PhotosPage', segment: 'photos', priority: 'low', defaultHistory: [] }
                    ]
                }),
                __WEBPACK_IMPORTED_MODULE_7__pages_jeux_list_jeux_list_module__["JeuxListPageModule"],
                __WEBPACK_IMPORTED_MODULE_9__pages_about_about_module__["AboutPageModule"],
                __WEBPACK_IMPORTED_MODULE_10__pages_jeux_list_jeu_new_jeu_new_module__["JeuNewPageModule"],
                __WEBPACK_IMPORTED_MODULE_11__pages_jeux_list_jeu_jeu_module__["JeuPageModule"],
                __WEBPACK_IMPORTED_MODULE_8__pages_tab_tab_module__["TabPageModule"],
                __WEBPACK_IMPORTED_MODULE_15__pages_photos_photos_module__["PhotosPageModule"],
                __WEBPACK_IMPORTED_MODULE_13_angularfire2__["a" /* AngularFireModule */].initializeApp(firebase),
                __WEBPACK_IMPORTED_MODULE_14_angularfire2_firestore__["b" /* AngularFirestoreModule */]
            ],
            bootstrap: [__WEBPACK_IMPORTED_MODULE_2_ionic_angular__["b" /* IonicApp */]],
            entryComponents: [
                __WEBPACK_IMPORTED_MODULE_5__app_component__["a" /* MyApp */],
                __WEBPACK_IMPORTED_MODULE_6__pages_home_home__["a" /* HomePage */]
            ],
            providers: [
                __WEBPACK_IMPORTED_MODULE_4__ionic_native_status_bar__["a" /* StatusBar */],
                __WEBPACK_IMPORTED_MODULE_3__ionic_native_splash_screen__["a" /* SplashScreen */],
                { provide: __WEBPACK_IMPORTED_MODULE_1__angular_core__["u" /* ErrorHandler */], useClass: __WEBPACK_IMPORTED_MODULE_2_ionic_angular__["c" /* IonicErrorHandler */] },
                __WEBPACK_IMPORTED_MODULE_12__providers_jeu_jeu__["a" /* JeuProvider */],
                __WEBPACK_IMPORTED_MODULE_16__ionic_native_camera__["a" /* Camera */]
            ]
        })
    ], AppModule);
    return AppModule;
}());

//# sourceMappingURL=app.module.js.map

/***/ }),

/***/ 804:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return MyApp; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(24);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__ionic_native_status_bar__ = __webpack_require__(418);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__ionic_native_splash_screen__ = __webpack_require__(417);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__pages_tab_tab__ = __webpack_require__(370);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var MyApp = /** @class */ (function () {
    function MyApp(platform, statusBar, splashScreen) {
        this.rootPage = __WEBPACK_IMPORTED_MODULE_4__pages_tab_tab__["a" /* TabPage */];
        platform.ready().then(function () {
            // Okay, so the platform is ready and our plugins are available.
            // Here you can do any higher level native things you might need.
            statusBar.styleDefault();
            splashScreen.hide();
        });
    }
    MyApp = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({template:/*ion-inline-start:"C:\xampp\htdocs\Ionic\jeux\src\app\app.html"*/'<ion-nav [root]="rootPage"></ion-nav>\n'/*ion-inline-end:"C:\xampp\htdocs\Ionic\jeux\src\app\app.html"*/
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ionic_angular__["h" /* Platform */], __WEBPACK_IMPORTED_MODULE_2__ionic_native_status_bar__["a" /* StatusBar */], __WEBPACK_IMPORTED_MODULE_3__ionic_native_splash_screen__["a" /* SplashScreen */]])
    ], MyApp);
    return MyApp;
}());

//# sourceMappingURL=app.component.js.map

/***/ }),

/***/ 95:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return JeuProvider; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_angularfire2_firestore__ = __webpack_require__(258);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs__ = __webpack_require__(515);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_rxjs___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_rxjs__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_rxjs_operators__ = __webpack_require__(366);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_rxjs_operators___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_3_rxjs_operators__);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




var JeuProvider = /** @class */ (function () {
    function JeuProvider(db) {
        this.db = db;
        this.jeux = [];
        this.jeuSubject = new __WEBPACK_IMPORTED_MODULE_2_rxjs__["Subject"]();
        this.getAllJeux();
    }
    // Permet d'envoyer les modifications à tous les composants en train d'utiliser le Subject
    JeuProvider.prototype.emitJeuSubject = function () {
        this.jeuSubject.next(this.jeux.slice());
    };
    // Permet de retourner le jeu correspondant à l'id
    JeuProvider.prototype.getJeuById = function (id) {
        for (var _i = 0, _a = this.jeux; _i < _a.length; _i++) {
            var jeu = _a[_i];
            if (jeu.id == id)
                return jeu;
        }
    };
    // Permet de sauvegarder un nouveau jeu dans la bdd
    JeuProvider.prototype.saveNewJeu = function (jeu) {
        var _this = this;
        return new __WEBPACK_IMPORTED_MODULE_2_rxjs__["Observable"](function (obs) {
            _this.db.collection('jeux').add(jeu).then(function () {
                console.log('success');
                obs.next();
            });
        });
    };
    // Permet de retourner tous les jeux de la bdd
    JeuProvider.prototype.getAllJeux = function () {
        var _this = this;
        return this.db.collection('jeux').snapshotChanges().pipe(Object(__WEBPACK_IMPORTED_MODULE_3_rxjs_operators__["map"])(function (changes) {
            return changes.map(function (doc) {
                return {
                    id: doc.payload.doc.id,
                    data: doc.payload.doc.data()
                };
            });
        })).subscribe(function (res) {
            _this.jeux = res;
            _this.emitJeuSubject();
        });
    };
    // Permet de mettre à jour un jeu dans la bdd
    JeuProvider.prototype.update = function (jeu, id) {
        var _this = this;
        return new __WEBPACK_IMPORTED_MODULE_2_rxjs__["Observable"](function (obs) {
            _this.db.doc("jeux/" + id).update(jeu);
            obs.next();
        });
    };
    // Permet de supprimer un jeu dans la bdd
    JeuProvider.prototype.delete = function (id) {
        this.db.doc("jeux/" + id).delete();
    };
    JeuProvider = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_angularfire2_firestore__["a" /* AngularFirestore */]])
    ], JeuProvider);
    return JeuProvider;
}());

//# sourceMappingURL=jeu.js.map

/***/ })

},[419]);
//# sourceMappingURL=main.js.map
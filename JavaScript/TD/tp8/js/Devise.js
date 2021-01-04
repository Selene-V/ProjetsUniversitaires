export class Devise {
    /**
     * Constructeur
     * @param nomDevise
     * @param tauxConversionEuro
     */
    constructor(nomDevise, montant, tauxConversionEuro) {
        this._nomDevise = nomDevise;
        this._montant = montant;
        this._tauxConversionEuro = tauxConversionEuro;
    }
    get nomDevise() {
        return this._nomDevise;
    }
    set nomDevise(value) {
        this._nomDevise = value;
    }
    get montant() {
        return this._montant;
    }
    set montant(value) {
        this._montant = value;
    }
    get tauxConversionEuro() {
        return this._tauxConversionEuro;
    }
    set tauxConversionEuro(value) {
        this._tauxConversionEuro = value;
    }
    /**
     * Permet d'ajouter ou de retirer de l'argent à la devise
     * @param m
     * @param transaction
     */
    gererArgentDevise(m, transaction) {
        console.log(this._montant);
        console.log(m);
        if (transaction === 2) {
            if ((this._montant - m) >= 0) {
                console.log("on est bon");
                this._montant -= m;
                console.log(this._montant);
                return true;
            }
            else {
                return false;
            }
        }
        else {
            this._montant += m;
            console.log(this._montant);
            return true;
        }
    }
}
//# sourceMappingURL=Devise.js.map
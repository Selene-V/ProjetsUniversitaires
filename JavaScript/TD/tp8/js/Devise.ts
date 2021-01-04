export class Devise{

    private _nomDevise : string;
    private _montant : number;
    private _tauxConversionEuro : number;

    /**
     * Constructeur
     * @param nomDevise
     * @param tauxConversionEuro
     */
    public constructor(nomDevise : string, montant : number, tauxConversionEuro : number) {
        this._nomDevise = nomDevise;
        this._montant = montant;
        this._tauxConversionEuro = tauxConversionEuro;
    }

    get nomDevise(): string {
        return this._nomDevise;
    }

    set nomDevise(value: string) {
        this._nomDevise = value;
    }

    get montant(): number {
        return this._montant;
    }

    set montant(value: number) {
        this._montant = value;
    }

    get tauxConversionEuro(): number {
        return this._tauxConversionEuro;
    }

    set tauxConversionEuro(value: number) {
        this._tauxConversionEuro = value;
    }

    /**
     * Permet d'ajouter ou de retirer de l'argent à la devise
     * @param m
     * @param transaction
     */
    public gererArgentDevise(m : number, transaction : number) : boolean{
        console.log(this._montant);
        console.log(m);
        if (transaction === 2){
            if ((this._montant - m) >= 0){
                console.log("on est bon");
                this._montant -= m;
                console.log(this._montant);
                return true;
            } else {
                return false;
            }
        } else {
            this._montant += m;
            console.log(this._montant);
            return true;
        }
    }
}
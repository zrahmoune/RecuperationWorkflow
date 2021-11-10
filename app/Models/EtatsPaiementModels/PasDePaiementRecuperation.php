<?php

namespace App\Models\EtatsPaiementModels;

use App\Models\Interfaces\EtatPaiement;
use App\Models\EtatsLivraisonModels\ARecuperer;
use App\Models\EtatsLivraisonModels\AnnuleeParVendeur;
use App\Models\Livraison;

class PasDePaiementRecuperation implements EtatPaiement 
{

    protected Livraison $livraison;

    public function __construct($livraison)
    {
        $this->livraison = $livraison;
    }
    
    public function changerEtatPaiement(){
        switch ($this->livraison->getTypeLivraison()) {
            // Récupération
            case 3:
                // Etat paiement reste stable dans le type Récupération
                $this->livraison->setEtatPaiementActuel($this);
                break;           
            default:
                # code...
                break;
        }
    }

    public function __toString(){
        return "PasDePaiementRecuperation";
    }

}
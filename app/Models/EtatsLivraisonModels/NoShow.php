<?php

namespace App\Models\EtatsLivraisonModels;

use App\Models\Interfaces\EtatLivraison;
use App\Models\Livraison;
use App\Models\EtatsLivraisonModels\RDVClientNoShow;

class NoShow implements EtatLivraison 
{
    protected Livraison $livraison;

    public function __construct($livraison)
    {
        $this->livraison = $livraison;
    }

    /**
     * Marquer A récupérer
     */
    public function ARecuperer(){
        throw new \Exception('On ne peut pas aller vers l\état "ARecuperer" depuis l\état "NoShow".');   
    }

    /**
     * Marquer Annulé par vendeur
     */
    public function AnnuleeParVendeur(){
        throw new \Exception('On ne peut pas aller vers l\état "AnnuleeParVendeur" depuis l\état "NoShow".');
    }

    /**
     * Marquer Livrée vers Client
     */    
    public function LivreurVersClient(){
        throw new \Exception('On ne peut pas aller vers l\état "LivreurVersClient" depuis l\état "NoShow".');
    }

    /**
     * Marquer Annulée par Client
     */    
    public function AnnuleeParClient(){
        throw new \Exception('On ne peut pas aller vers l\état "AnnuleeParClient" depuis l\état "NoShow".');
    }

    /**
     * Marquer Annulée par Client par Téléphone
     */    
    public function AnnuleeParClientParTelephone(){
        throw new \Exception('On ne peut pas aller vers l\état "AnnuleeParClientParTelephone" depuis l\état "NoShow".');
    }

    /**
     * Marquer Reportée
     */    
    public function Reportee(){
        throw new \Exception('On ne peut pas aller vers l\état "Reportee" depuis l\état "NoShow".');
    }
 
    /**
     * Marquer NoShow
     */
    public function NoShow(){
        throw new \Exception('On ne peut pas aller vers l\état "NoShow" depuis l\état "NoShow".');
    }

    /**
     * Marquer RDVClientNowShow
     */    
    public function RDVClientNoShow(){
        $this->livraison->changerEtatLivraison(new RDVClientNoShow($this->livraison));
    }

    /**
     * Marquer Récupéré
     */    
    public function Recuperee(){
        throw new \Exception('On ne peut pas aller vers l\état "Recuperee" depuis l\état "Pinding".');
    }

    /**
     * Marquer LivreurVersHubRetour
     */
    public function LivreurVersHubRetour(){
        throw new \Exception('On ne peut pas aller vers l\état "LivreurVersHubRetour" depuis l\état "Pinding".');
    }

    /**
     * Marquer HubRetour
     */
    public function HubRetour(){
        throw new \Exception('On ne peut pas aller vers l\état "HubRetour" depuis l\état "NoShow".');
    }

    public function __toString(){
        return "NoShow";
    }

}
<?php

namespace App\Models\EtatsLivraisonModels;

use App\Models\Interfaces\EtatLivraison;
use App\Models\Livraison;
use App\Models\EtatsLivraisonModels\Recuperee;

class RDVClientNoShow implements EtatLivraison 
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
        throw new \Exception('On ne peut pas aller vers l\état "ARecuperer" depuis l\état "RDVClientNoShow".');   
    }

    /**
     * Marquer Annulé par vendeur
     */
    public function AnnuleeParVendeur(){
        throw new \Exception('On ne peut pas aller vers l\état "AnnuleeParVendeur" depuis l\état "RDVClientNoShow".');
    }

    /**
     * Marquer Livrée vers Client
     */    
    public function LivreurVersClient(){
        throw new \Exception('On ne peut pas aller vers l\état "LivreurVersClient" depuis l\état "RDVClientNoShow".');
    }

    /**
     * Marquer Annulée par Client
     */    
    public function AnnuleeParClient(){
        throw new \Exception('On ne peut pas aller vers l\état "AnnuleeParClient" depuis l\état "RDVClientNoShow".');
    }

    /**
     * Marquer Annulée par Client par Téléphone
     */    
    public function AnnuleeParClientParTelephone(){
        throw new \Exception('On ne peut pas aller vers l\état "AnnuleeParClientParTelephone" depuis l\état "RDVClientNoShow".');
    }

    /**
     * Marquer Reportée
     */    
    public function Reportee(){
        throw new \Exception('On ne peut pas aller vers l\état "Reportee" depuis l\état "RDVClientNoShow".');
    }
 
    /**
     * Marquer NoShow
     */
    public function NoShow(){
        throw new \Exception('On ne peut pas aller vers l\état "NoShow" depuis l\état "RDVClientNoShow".');
    }

    /**
     * Marquer RDVClientNowShow
     */    
    public function RDVClientNoShow(){
        throw new \Exception('On ne peut pas aller vers l\état "RDVClientNoShow" depuis l\état "RDVClientNoShow".');
    }

    /**
     * Marquer Récupéré
     */    
    public function Recuperee(){
        $this->livraison->changerEtatLivraison(new Recuperee($this->livraison));
    }

    /**
     * Marquer LivreurVersHubRetour
     */
    public function LivreurVersHubRetour(){
        throw new \Exception('On ne peut pas aller vers l\état "LivreurVersHubRetour" depuis l\état "RDVClientNoShow".');
    }

    /**
     * Marquer HubRetour
     */
    public function HubRetour(){
        throw new \Exception('On ne peut pas aller vers l\état "HubRetour" depuis l\état "RDVClientNoShow".');
    }

    public function __toString(){
        return "RDVClientNoShow";
    }

}
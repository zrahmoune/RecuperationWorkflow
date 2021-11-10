<?php

namespace App\Models\EtatsLivraisonModels;

use App\Models\Interfaces\EtatLivraison;
use App\Models\EtatsLivraisonModels\ARecuperer;
use App\Models\EtatsLivraisonModels\AnnuleeParClient;
use App\Models\EtatsLivraisonModels\AnnuleeParClientParTelephone;
use App\Models\Livraison;

class LivreurVersClient implements EtatLivraison 
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
        $this->livraison->changerEtatLivraison(new ARecuperer($this->livraison));
    }

    /**
     * Marquer Annulé par vendeur
     */
    public function AnnuleeParVendeur(){
        throw new \Exception('On ne peut pas aller vers l\état "AnnuleeParVendeur" depuis l\état "LivreurVersClient".');
    }

    /**
     * Marquer Livrée vers Client
     */    
    public function LivreurVersClient(){
        throw new \Exception('On ne peut pas aller vers l\état "LivreurVersClient" depuis l\état "LivreurVersClient".');
    }

    /**
     * Marquer Annulée par Client
     */    
    public function AnnuleeParClient(){
        $this->livraison->changerEtatLivraison(new AnnuleeParClient($this->livraison));
    }

    /**
     * Marquer Annulée par Client par Téléphone
     */    
    public function AnnuleeParClientParTelephone(){
        $this->livraison->changerEtatLivraison(new AnnuleeParClientParTelephone($this->livraison));
    }

    /**
     * Marquer Reportée
     */    
    public function Reportee(){
        $this->livraison->changerEtatLivraison(new Reportee($this->livraison));
    }
 
    /**
     * Marquer NoShow
     */
    public function NoShow(){
        $this->livraison->changerEtatLivraison(new NoShow($this->livraison));
    }

    /**
     * Marquer RDVClientNowShow
     */    
    public function RDVClientNoShow(){
        throw new \Exception('On ne peut pas aller vers l\état "RDVClientNoShow" depuis l\état "LivreurVersClient".');
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
        throw new \Exception('On ne peut pas aller vers l\état "LivreurVersHubRetour" depuis l\état "LivreurVersClient".');
    }

    /**
     * Marquer HubRetour
     */
    public function HubRetour(){
        throw new \Exception('On ne peut pas aller vers l\état "HubRetour" depuis l\état "LivreurVersClient".');
    }

    public function __toString(){
        return "LivreurVersClient";
    }

}
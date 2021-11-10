<?php

namespace App\Models\EtatsLivraisonModels;

use App\Models\Interfaces\EtatLivraison;
use App\Models\EtatsLivraisonModels\LivreurVersClient;
use App\Models\livraison;

class ARecuperer implements EtatLivraison 
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
        throw new \Exception("On ne peut pas aller vers l'état 'ARecuperer' depuis l'état 'ARecuperer'.");
    }

    /**
     * Marquer Annulé par vendeur
     */
    public function AnnuleeParVendeur(){
        throw new \Exception("On ne peut pas aller vers l'état 'AnnuleeParVendeur' depuis l'état 'ARecuperer'.");
    }

    /**
     * Marquer Livrée vers Client
     */    
    public function LivreurVersClient(){
        $this->livraison->changerEtatLivraison(new LivreurVersClient($this->livraison));
    }

    /**
     * Marquer Annulée par Client
     */    
    public function AnnuleeParClient(){
        throw new \Exception("On ne peut pas aller vers l'état 'AnnuleeParClient' depuis l'état 'ARecuperer'.");
    }

    /**
     * Marquer Annulée par Client par Téléphone
     */    
    public function AnnuleeParClientParTelephone(){
        throw new \Exception("On ne peut pas aller vers l'état 'AnnuleeParClientParTelephone' depuis l'état 'ARecuperer'.");
    }

    /**
     * Marquer Reportée
     */    
    public function Reportee(){
        throw new \Exception("On ne peut pas aller vers l'état 'Reportée' depuis l'état 'ARecuperer'.");
    }
 
    /**
     * Marquer NoShow
     */
    public function NoShow(){
        throw new \Exception("On ne peut pas aller vers l'état 'NoShow' depuis l'état 'ARecuperer'.");
    }

    /**
     * Marquer RDVClientNowShow
     */    
    public function RDVClientNoShow(){
        throw new \Exception("On ne peut pas aller vers l'état 'RDVClientNoShow' depuis l'état 'ARecuperer'.");
    }

    /**
     * Marquer Récupéré
     */    
    public function Recuperee(){
        throw new \Exception("On ne peut pas aller vers l'état 'Recuperee' depuis l'état 'ARecuperer'.");
    }

    /**
     * Marquer LivreurVersHubRetour
     */
    public function LivreurVersHubRetour(){
        throw new \Exception("On ne peut pas aller vers l'état 'LivreurVersHubRetour' depuis l'état 'Pinding'.");
    }

    /**
     * Marquer HubRetour
     */
    public function HubRetour(){
        throw new \Exception("On ne peut pas aller vers l'état 'HubRetour' depuis l'état 'ARecuperer'.");
    }

    public function __toString(){
        return "ARecuperer";
    }

}
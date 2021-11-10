<?php

namespace App\Models\EtatsLivraisonModels;

use App\Models\Interfaces\EtatLivraison;
use App\Models\Livraison;

class HubRetour implements EtatLivraison 
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
        throw new \Exception("On ne peut pas démarrer avec l'état HubRetour, c'est un état final.");
    }

    /**
     * Marquer Annulé par vendeur
     */
    public function AnnuleeParVendeur(){
        throw new \Exception("On ne peut pas démarrer avec l'état HubRetour, c'est un état final.");
    }

    /**
     * Marquer Livrée vers Client
     */    
    public function LivreurVersClient(){
        throw new \Exception("On ne peut pas démarrer avec l'état HubRetour, c'est un état final.");
    }

    /**
     * Marquer Annulée par Client
     */    
    public function AnnuleeParClient(){
        throw new \Exception('On ne peut pas aller vers l\état "AnnuleeParClient" depuis l\état "Recuperee".');
    }

    /**
     * Marquer Annulée par Client par Téléphone
     */    
    public function AnnuleeParClientParTelephone(){
        throw new \Exception("On ne peut pas démarrer avec l'état HubRetour, c'est un état final.");
    }

    /**
     * Marquer Reportée
     */    
    public function Reportee(){
        throw new \Exception("On ne peut pas démarrer avec l'état HubRetour, c'est un état final.");
    }
 
    /**
     * Marquer NoShow
     */
    public function NoShow(){
        throw new \Exception("On ne peut pas démarrer avec l'état HubRetour, c'est un état final.");
    }

    /**
     * Marquer RDVClientNowShow
     */    
    public function RDVClientNoShow(){
        throw new \Exception("On ne peut pas démarrer avec l'état HubRetour, c'est un état final.");
    }

    /**
     * Marquer Récupéré
     */    
    public function Recuperee(){
        throw new \Exception("On ne peut pas démarrer avec l'état HubRetour, c'est un état final.");
    }

    /**
     * Marquer LivreurVersHubRetour
     */
    public function LivreurVersHubRetour(){
        throw new \Exception("On ne peut pas démarrer avec l'état HubRetour, c'est un état final.");
    }

    /**
     * Marquer HubRetour
     */
    public function HubRetour(){
        throw new \Exception("On ne peut pas démarrer avec l'état HubRetour, c'est un état final.");
    }

    public function __toString(){
        return "HubRetour";
    }

}
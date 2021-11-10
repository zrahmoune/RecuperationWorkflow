<?php

namespace App\Models\EtatsLivraisonModels;

use App\Models\Interfaces\EtatLivraison;
use App\Models\Livraison;

class AnnuleeParVendeur implements EtatLivraison 
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
        throw new \Exception('Transition invalide');
    }

    /**
     * Marquer Livrée vers Client
     */    
    public function LivreurVersClient(){
        throw new \Exception('Transition invalide');
    }

    /**
     * Marquer Annulée par Client
     */    
    public function AnnuleeParClient(){
        throw new \Exception('Transition invalide');
    }

    /**
     * Marquer Annulée par Client par Téléphone
     */    
    public function AnnuleeParClientParTelephone(){
        throw new \Exception('Transition invalide');
    }

    /**
     * Marquer Reportée
     */    
    public function Reportee(){
        throw new \Exception('Transition invalide');
    }
 
    /**
     * Marquer NoShow
     */
    public function NoShow(){
        throw new \Exception('Transition invalide');
    }

    /**
     * Marquer RDVClientNowShow
     */    
    public function RDVClientNoShow(){
        throw new \Exception('Transition invalide');
    }

    /**
     * Marquer Récupéré
     */    
    public function Recuperee(){
        throw new \Exception('Transition invalide');
    }

    /**
     * Marquer LivreurVersHubRetour
     */
    public function LivreurVersHubRetour(){
        throw new \Exception('Transition invalide');
    }

    /**
     * Marquer HubRetour
     */
    public function HubRetour(){
        throw new \Exception('Transition invalide');
    }

    public function __toString(){
        return "AnnuleeParVendeur";
    }

}
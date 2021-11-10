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
        throw new \Exception('On ne peut pas aller vers l\état "AnnuleeParVendeur" depuis l\état "AnnuleeParVendeur".');
    }

    /**
     * Marquer Livrée vers Client
     */    
    public function LivreurVersClient(){
        throw new \Exception('On ne peut pas aller vers l\état "LivreurVersClient" depuis l\état "AnnuleeParVendeur".');
    }

    /**
     * Marquer Annulée par Client
     */    
    public function AnnuleeParClient(){
        throw new \Exception('On ne peut pas aller vers l\état "AnnuleeParClient" depuis l\état "AnnuleeParVendeur".');
    }

    /**
     * Marquer Annulée par Client par Téléphone
     */    
    public function AnnuleeParClientParTelephone(){
        throw new \Exception('On ne peut pas aller vers l\état "AnnuleeParClientParTelephone" depuis l\état "AnnuleeParVendeur".');
    }

    /**
     * Marquer Reportée
     */    
    public function Reportee(){
        throw new \Exception('On ne peut pas aller vers l\état "Reportee" depuis l\état "AnnuleeParVendeur".');
    }
 
    /**
     * Marquer NoShow
     */
    public function NoShow(){
        throw new \Exception('On ne peut pas aller vers l\état "NoShow" depuis l\état "AnnuleeParVendeur".');
    }

    /**
     * Marquer RDVClientNowShow
     */    
    public function RDVClientNoShow(){
        throw new \Exception('On ne peut pas aller vers l\état "RDVClientNoShow" depuis l\état "AnnuleeParVendeur".');
    }

    /**
     * Marquer Récupéré
     */    
    public function Recuperee(){
        throw new \Exception('On ne peut pas aller vers l\état "Recuperee" depuis l\état "AnnuleeParVendeur".');
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
        throw new \Exception('On ne peut pas aller vers l\état "HubRetour" depuis l\état "AnnuleeParVendeur".');
    }

    public function __toString(){
        return "AnnuleeParVendeur";
    }

}
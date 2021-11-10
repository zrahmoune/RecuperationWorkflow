<?php

namespace App\Models\EtatsLivraisonModels;

use App\Models\Interfaces\EtatLivraison;
use App\Models\Livraison;
use App\Models\EtatsLivraisonModels\HubRetour;

class LivreurVersHubRetour implements EtatLivraison 
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
        throw new \Exception('On ne peut pas aller vers l\état "ARecuperer" depuis l\état "LivreurVersHubRetour".');   
    }

    /**
     * Marquer Annulé par vendeur
     */
    public function AnnuleeParVendeur(){
        throw new \Exception('On ne peut pas aller vers l\état "AnnuleeParVendeur" depuis l\état "LivreurVersHubRetour".');
    }

    /**
     * Marquer Livrée vers Client
     */    
    public function LivreurVersClient(){
        throw new \Exception('On ne peut pas aller vers l\état "LivreurVersClient" depuis l\état "LivreurVersHubRetour".');
    }

    /**
     * Marquer Annulée par Client
     */    
    public function AnnuleeParClient(){
        throw new \Exception('On ne peut pas aller vers l\état "AnnuleeParClient" depuis l\état "LivreurVersHubRetour".');
    }

    /**
     * Marquer Annulée par Client par Téléphone
     */    
    public function AnnuleeParClientParTelephone(){
        throw new \Exception('On ne peut pas aller vers l\état "AnnuleeParClientParTelephone" depuis l\état "LivreurVersHubRetour".');
    }

    /**
     * Marquer Reportée
     */    
    public function Reportee(){
        throw new \Exception('On ne peut pas aller vers l\état "Reportee" depuis l\état "LivreurVersHubRetour".');
    }
 
    /**
     * Marquer NoShow
     */
    public function NoShow(){
        throw new \Exception('On ne peut pas aller vers l\état "NoShow" depuis l\état "LivreurVersHubRetour".');
    }

    /**
     * Marquer RDVClientNowShow
     */    
    public function RDVClientNoShow(){
        throw new \Exception('On ne peut pas aller vers l\état "RDVClientNoShow" depuis l\état "LivreurVersHubRetour".');
    }

    /**
     * Marquer Récupéré
     */    
    public function Recuperee(){
        throw new \Exception('On ne peut pas aller vers l\état "Recuperee" depuis l\état "LivreurVersHubRetour".');
    }

    /**
     * Marquer LivreurVersHubRetour
     */
    public function LivreurVersHubRetour(){
        throw new \Exception('On ne peut pas aller vers l\état "LivreurVersHubRetour" depuis l\état "LivreurVersHubRetour".');
    }

    /**
     * Marquer HubRetour
     */
    public function HubRetour(){
        $this->livraison->changerEtatLivraison(new HubRetour($this->livraison));
    }

    public function __toString(){
        return "LivreurVersHubRetour";
    }

}
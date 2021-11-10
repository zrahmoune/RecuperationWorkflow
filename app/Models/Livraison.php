<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Importer les classes model
use App\Models\EtatsLivraisonModels\Pending;
use App\Models\EtatsLivraisonModels\ARecuperer;
use App\Models\EtatsLivraisonModels\AnnuleeParVendeur;
use App\Models\EtatsLivraisonModels\LivreurVersClient;
use App\Models\EtatsLivraisonModels\AnnuleeParClient;
use App\Models\EtatsLivraisonModels\AnnuleeParClientParTelephone;
use App\Models\EtatsLivraisonModels\Reportee;
use App\Models\EtatsLivraisonModels\RDVClientNoShow;
use App\Models\EtatsLivraisonModels\NoShow;
use App\Models\EtatsLivraisonModels\Recuperee;
use App\Models\EtatsLivraisonModels\LivreurVersHubRetour;
use App\Models\EtatsLivraisonModels\HubRetour;

use App\Models\EtatsPaiementModels\PasDePaiementRecuperation;

// Importer les interfaces
use App\Models\Interfaces\EtatLivraison;
use App\Models\Interfaces\EtatPaiement;

class Livraison extends Model
{
    use HasFactory;
    protected $idCommande;
    protected $typeLivraison;
    protected EtatLivraison $etatLivraisonActuel;
    protected EtatPaiement $etatPaiementActuel;

    public function __construct($idCommande, $typeLivraison, $codeEtatLivraisonActuel, $codeEtatPaiementActuel)
    {
        $this->idCommande = $idCommande;
        $this->typeLivraison = $typeLivraison;
        $this->etatLivraisonActuel = $this->recupererEtatLivraison($codeEtatLivraisonActuel);
        $this->etatPaiementActuel = $this->recupererEtatPaiement($codeEtatPaiementActuel);
    }   

    /**
     * Changer l'état Livraison/Paiement
     * Etat Paiement reste toujours à 'n' (affecté au niveau du constructeur) donc pas de changements
     */
    public function changerEtatRecuperation($codeNouvelEtatLivraison){
        // Récupérer le nouvel état depuis son code
        $nouvelEtatLivraison = $this->recupererEtatLivraison($codeNouvelEtatLivraison);
        // Définir le nom de la méthode à appeler on se basant sur le nom du nouvel 'état
        $methode_name = $nouvelEtatLivraison->__toString();
        // Appeler la méthode 
        $this->$methode_name();
    }

    /**
     * Chercher le nom de l'état Livraison selon son code
     */
    public function recupererEtatLivraison($codeEtatLivraison) : EtatLivraison {
        // Récupérer le nom de l'état depuis son code
        $etat = config('codeEtat.livraison.' . $codeEtatLivraison);
        switch ($etat) {
            case 'Pending':
                return new Pending($this);
                break;
            case 'LivreurVersClient':
                return new LivreurVersClient($this);
                break;
            case 'NoShow':
                return new NoShow($this);
                break;
            case 'AnnuleeParClient':
                return new AnnuleeParClient($this);
                break;
            case 'LivreurVersHubRetour':
                return new LivreurVersHubRetour($this);
                break;
            case 'HubRetour':
                return new HubRetour($this);
                break;
            case 'AnnuleeParVendeur':
                return new AnnuleeParVendeur($this);
                break;
            case 'Reportee':
                return new Reportee($this);
                break;
            case 'RDVClientNoShow':
                return new RDVClientNoShow($this);
                break;
            case 'AnnuleeParClientParTelephone':
                return new AnnuleeParClientParTelephone($this);
                break;
            case 'ARecuperer':
                return new ARecuperer($this);
                break;
            case 'Recuperee':
                return new Recuperee($this);
                break;
            default:
                # code...
                break;
        }       
    }

    /**
     * Chercher le nom de l'état Paiement selon son code
     */
    public function recupererEtatPaiement($codeEtatPaiement) : EtatPaiement {
        // Récupérer le nom de l'état depuis son code
        $etat = config('codeEtat.paiement.' . $codeEtatPaiement);
        switch ($etat) {
            case 'n':
                return new PasDePaiementRecuperation($this);
                break;
            default:
                return new PasDePaiementRecuperation($this);
            break;
        }       
    }

    /**
     * Modifier
     */
    public function modifier(){
        // Effectuer les opérations de modification
        // Marquer A Recupérer
        $this->ARecuperer();
    }

    /**
     * Valider
     */
    public function valider(){
        // Effectuer les opérations de validation
        // Marquer A Recupérer
        $this->ARecuperer();
    }

    /**
     * Marquer ARecuperer
     */
    public function ARecuperer(){
        $this->etatLivraisonActuel->ARecuperer();
    }

    /**
     * Annuler par vendeur
     */
    public function AnnuleeParVendeur(){
        // Effectuer les opérations d'annulation
        // Marquer A Recupérer
        $this->etatLivraisonActuel->AnnuleeParVendeur();
    }

    /**
     * Marquer Livrée vers Client
     */    
    public function LivreurVersClient(){
        $this->etatLivraisonActuel->LivreurVersClient();
    }

    /**
     * Marquer Annulée par Client
     */    
    public function AnnuleeParClient(){
        $this->etatLivraisonActuel->AnnuleeParClient();
    }

    /**
     * Marquer Annulée par Client par Téléphone
     */    
    public function AnnuleeParClientParTelephone(){
        $this->etatLivraisonActuel->AnnuleeParClientParTelephone();
    }

    /**
     * Marquer Reportée
     */    
    public function Reportee(){
        $this->etatLivraisonActuel->Reportee();
    }
 
    /**
     * Marquer NoShow
     */
    public function NoShow(){
        $this->etatLivraisonActuel->NoShow();
    }

    /**
     * Marquer RDVClientNowShow
     */    
    public function RDVClientNoShow(){
        $this->etatLivraisonActuel->RDVClientNoShow();
    }

    /**
     * Marquer Récupéré
     */    
    public function Recuperee(){
        // Mettre un asynchron call
        $this->etatLivraisonActuel->Recuperee();
        // Mettre ici les contaraintes de l'enchaînement automatique si elles existent
        $this->etatLivraisonActuel = new LivreurVersHubRetour($this);
    }
  
    /**
     * Marquer livreurVersHubRetour
     */
    public function LivreurVersHubRetour(){
        $this->etatLivraisonActuel->LivreurVersHubRetour();
    }

    /**
     * Marquer HubRetour
     */
    public function HubRetour(){
        $this->etatLivraisonActuel->HubRetour();
    }

    public function changerEtatLivraison(EtatLivraison $state){
        $this->etatLivraisonActuel = $state;
    }
    
    public function changerEtatPaiement(){
        $this->etatPaiementActuel->changerEtatPaiement();
    }
    
    public function setEtatPaiementActuel(EtatPaiement $state){
        $this->etatPaiementActuel = $state;
    }
    
    public function getEtatPaiementActuel(){
        return $this->etatPaiementActuel;
    }

    public function getEtatLivraisonActuel(){
        return $this->etatLivraisonActuel;
    }
    
    public function getTypeLivraison(){
        return $this->typeLivraison;
    }



}

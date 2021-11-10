<?php

namespace App\Http\Controllers;
use Exception;

use App\Models\Livraison;

class LivraisonController extends Controller
{
    private Livraison $recuperation;

    /**
     * verifier la validité des transitions Récuperation
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyRecuperationStateTransition($idCmd, $typeLivraison,
        $idEtatLivraisonCourant, $idNouvelEtatLivraion, $idEtatPaiementCourant, $idNouvelEtatPaiement)
    {
        try {
            $this->testRecuperationTransitions($idCmd, $typeLivraison, $idEtatLivraisonCourant, $idNouvelEtatLivraion, $idEtatPaiementCourant, $idNouvelEtatPaiement);
        } catch (Exception $ex) {
            return response()->json([
                'valide' => false,
                'message' => $ex->getMessage()
            ]);           
        }
        return response()->json([
            'valide' => true,
            'message' => $this->recuperation->getEtatLivraisonActuel()->__toString()
        ]);                
    }

    /**
     * Tester la validité des transitions d'états pour le workflow Récupération
     */
    public function testRecuperationTransitions($idCmd, $typeLivraison, $idEtatLivraisonCourant, $idNouvelEtatLivraion, $idEtatPaiementCourant, $idNouvelEtatPaiement){
        // Vérifier s'il s'agit bien d'une Récupération
        if ($typeLivraison != 3){
            throw new \Exception ("Type de la livraison doit être '3'");          
        } 
        else {
            // Vérifier si l'état de paiment actuel et nouveau sont à 'n'
            if ($idEtatPaiementCourant != 'n' || $idNouvelEtatPaiement != 'n') 
                throw new \Exception ("Id etat paiement doit être 'n'.");          
            else {
                $etatCourrant = config('codeEtat.livraison.' . $idEtatLivraisonCourant);
                $nouvelEtat = config('codeEtat.livraison.' . $idNouvelEtatLivraion);
                // Id etat Recupération non valide
                if ($etatCourrant == '' || $nouvelEtat == '') throw new \Exception ("Id Etat récupération Non valide!");
                else {
                    // Etat Pinding est un état de démarrage
                    if ($idNouvelEtatLivraion == 1) 
                        throw new \Exception ("On ne peut pas aller vers l'état Pinding, C'est un état de démarrage.");          
                    else {
                        $this->recuperation = new Livraison($idCmd, $typeLivraison, $idEtatLivraisonCourant, $idEtatPaiementCourant);
                        try {
                            // Etat de paiment ne change pas
                            $this->recuperation->changerEtatRecuperation($idNouvelEtatLivraion);
                        } catch (Exception $ex) {
                            throw new \Exception ("Transition invalide : '".$this->recuperation->getEtatLivraisonActuel()->__toString()."' Vers : '".$nouvelEtat."'");
                        }                            
                    }
                }          
            }        
        } 
    }
}

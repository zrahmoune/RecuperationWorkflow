<?php

namespace Tests\Unit;

use App\Models\Livraison;
use App\Http\Controllers\LivraisonController;
use Exception;
use Tests\TestCase;

class RendingTest extends TestCase
{
    private LivraisonController $controller;

    /**
     * Tester un id etat recuperation non valide (8) 
     */
    public function testIdRecuperationNonValide(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,1,8,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals('Id Etat récupération Non valide!', $ex->getMessage());
        }    
    }

    /**
     * Tester un id etat paiment non valide (!= n) 
     */
    public function testIdPaiementNonValide(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,1,8,'j','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Id etat paiement doit être 'n'.", $ex->getMessage());
        }    
    }

    /**
     * Tester Nouvel etat = Pending  
     */
    public function testPendingAsNewState(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,1,1,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("On ne peut pas aller vers l'état Pinding, C'est un état de démarrage.", $ex->getMessage());
        }    
    }

    /**
     * Tester la méthode modifier (passage valide Pending(1) vers ARecuperer(27)) 
     */
    public function testModifier(){
        $r = new Livraison(1, 3, 1, 'n');
        $r->modifier();
        $this->assertEquals($r->getEtatLivraisonActuel()->__toString(), 'ARecuperer');
    }

    /**
     * Tester la méthode valider (passage valide Pending(1) vers ARecuperer(27)) 
     */
    public function testValider(){
        $r = new Livraison(1, 3, 1, 'n');
        $r->valider();
        $this->assertEquals($r->getEtatLivraisonActuel()->__toString(), 'ARecuperer');
    }
    
    /**
     * Tester la méthode AnnulerParVendeur (passage valide Pending(1) vers ARecuperer(27)) 
     */
    public function testAnnulerParVendeur(){
        $r = new Livraison(1, 3, 1, 'n');
        $r->AnnuleeParVendeur();
        $this->assertEquals($r->getEtatLivraisonActuel()->__toString(), 'AnnuleeParVendeur');
    }

    /**
     * Tester le passage invalide Pending(1) vers LivreurVersClient(7) 
     */
    public function testLivreurVersClient(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,1,7,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'Pending' Vers : 'LivreurVersClient'", $ex->getMessage());

        }    
    }

    /**
     * Tester le passage invalide Pending(1) vers AnnuleeParClient(14) 
     */
    public function testAnnuleeParClient(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,1,14,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'Pending' Vers : 'AnnuleeParClient'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide Pending(1) vers AnnuleeParClientParTelephone(23) 
     */
    public function testAnnuleeParClientParTelephone(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,1,23,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'Pending' Vers : 'AnnuleeParClientParTelephone'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide Pending(1) vers Reportee(21) 
     */
    public function testReportee(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,1,21,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'Pending' Vers : 'Reportee'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide Pending(1) vers NoShow(13) 
     */
    public function testNoShow(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,1,13,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'Pending' Vers : 'NoShow'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide Pending(1) vers RDVClientNoShow(22) 
     */
    public function testRDVClientNoShow(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,1,22,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'Pending' Vers : 'RDVClientNoShow'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide Pending(1) vers Recuperee(28) 
     */
    public function testRecuperee(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,1,28,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'Pending' Vers : 'Recuperee'", $ex->getMessage());
        }    
    }
    
    /**
     * Tester le passage invalide Pending(1) vers LivreurVersHubRetour(16) 
     */
    public function testLivreurVersHubRetour(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,1,16,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'Pending' Vers : 'LivreurVersHubRetour'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide Pending(1) vers HubRetour(17) 
     */
    public function testHubRetour(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,1,17,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'Pending' Vers : 'HubRetour'", $ex->getMessage());
        }    
    }

}

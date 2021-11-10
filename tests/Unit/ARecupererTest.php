<?php

namespace Tests\Unit;

use App\Models\Livraison;
use App\Http\Controllers\LivraisonController;
use Exception;
use Tests\TestCase;

/**
 * Tester les méthode de la classe ARecuperee
 */
class ARecupererTest extends TestCase
{

    /**
     * Tester le passage invalide ARecuperer(27) vers AnnuleeParVendeur(20) 
     */
    public function testAnnuleeParVendeur(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,27,20,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'ARecuperer' Vers : 'AnnuleeParVendeur'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage valide ARecuperer(27) vers LivreurVersClient(7) 
     */
    public function testLivreurVersClient(){
        $this->controller = new LivraisonController();
        $this->controller->testRecuperationTransitions(1,3,27,7,'n','n');
        $this->assertEquals($this->controller->getRecuperation()->getEtatLivraisonActuel()->__toString(), 'LivreurVersClient');   
    } 
    /**
     * Tester le passage invalide ARecuperer(27) vers AnnuleeParClient(14) 
     */
    public function testAnnuleeParClient(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,27,14,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'ARecuperer' Vers : 'AnnuleeParClient'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide ARecuperer(27) vers AnnuleeParClientParTelephone(23) 
     */
    public function testAnnuleeParClientParTelephone(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,27,23,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'ARecuperer' Vers : 'AnnuleeParClientParTelephone'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide ARecuperer(27) vers Reportee(21) 
     */
    public function testReportee(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,27,21,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'ARecuperer' Vers : 'Reportee'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide ARecuperer(27) vers NoShow(13) 
     */
    public function testNoShow(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,27,13,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'ARecuperer' Vers : 'NoShow'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide ARecuperer(27) vers RDVClientNoShow(22) 
     */
    public function testRDVClientNoShow(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,27,22,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'ARecuperer' Vers : 'RDVClientNoShow'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide ARecuperer(27) vers Recuperee(28) 
     */
    public function testRecuperee(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,27,28,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'ARecuperer' Vers : 'Recuperee'", $ex->getMessage());
        }    
    }
    
    /**
     * Tester le passage invalide ARecuperer(27) vers LivreurVersHubRetour(16) 
     */
    public function testLivreurVersHubRetour(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,27,16,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'ARecuperer' Vers : 'LivreurVersHubRetour'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide ARecuperer(27) vers HubRetour(17) 
     */
    public function testHubRetour(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,27,17,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'ARecuperer' Vers : 'HubRetour'", $ex->getMessage());
        }    
    }
 
    /**
     * Tester le passage invalide ARecuperer(27) vers ARecuperer(27) 
     */
    public function testARecuperer(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,27,27,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'ARecuperer' Vers : 'ARecuperer'", $ex->getMessage());
        }    
    } 

}

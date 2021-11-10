<?php

namespace Tests\Unit;

use App\Http\Controllers\LivraisonController;
use Exception;
use Tests\TestCase;

/**
 * Tester les méthode de la classe AnnuleeParVendeur
 */
class AnnuleeParVendeurTest extends TestCase
{

    private LivraisonController $controller;

    /**
     * Tester le passage valide AnnuleeParVendeur(20) vers ARecuperer(27) 
     */
    public function testARecuperer(){
        $this->controller = new LivraisonController();
        $this->controller->testRecuperationTransitions(1,3,20,27,'n','n');
        $this->assertEquals($this->controller->getRecuperation()->getEtatLivraisonActuel()->__toString(), 'ARecuperer');   
    } 

    /**
     * Tester le passage invalide AnnuleeParVendeur(20) vers AnnuleeParVendeur(20) 
     */
    public function testAnnuleeParVendeur(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,20,20,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'AnnuleeParVendeur' Vers : 'AnnuleeParVendeur'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide AnnuleeParVendeur(20) vers LivreurVersClient(7) 
     */
    public function testLivreurVersClient(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,20,7,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'AnnuleeParVendeur' Vers : 'LivreurVersClient'", $ex->getMessage());
        } 
    }

    /**
     * Tester le passage invalide AnnuleeParVendeur(20) vers AnnuleeParClient(14) 
     */
    public function testAnnuleeParClient(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,20,14,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'AnnuleeParVendeur' Vers : 'AnnuleeParClient'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide AnnuleeParVendeur(20) vers AnnuleeParClientParTelephone(23) 
     */
    public function testAnnuleeParClientParTelephone(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,20,23,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'AnnuleeParVendeur' Vers : 'AnnuleeParClientParTelephone'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide AnnuleeParVendeur(20) vers Reportee(21) 
     */
    public function testReportee(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,20,21,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'AnnuleeParVendeur' Vers : 'Reportee'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide AnnuleeParVendeur(20) vers NoShow(13) 
     */
    public function testNoShow(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,20,13,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'AnnuleeParVendeur' Vers : 'NoShow'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide AnnuleeParVendeur(20) vers RDVClientNoShow(22) 
     */
    public function testRDVClientNoShow(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,20,22,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'AnnuleeParVendeur' Vers : 'RDVClientNoShow'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide AnnuleeParVendeur(20) vers Recuperee(28) 
     */
    public function testRecuperee(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,20,28,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'AnnuleeParVendeur' Vers : 'Recuperee'", $ex->getMessage());
        }    
    }
    
    /**
     * Tester le passage invalide AnnuleeParVendeur(20) vers LivreurVersHubRetour(16) 
     */
    public function testLivreurVersHubRetour(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,20,16,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'AnnuleeParVendeur' Vers : 'LivreurVersHubRetour'", $ex->getMessage());
        }    
    }

    /**
     * Tester le passage invalide AnnuleeParVendeur(20) vers HubRetour(17) 
     */
    public function testHubRetour(){
        $this->controller = new LivraisonController();
        try {
            $this->controller->testRecuperationTransitions(1,3,20,17,'n','n');
            $this->fail("Pas d'exception");
        } catch (Exception $ex) {
            $this->assertEquals("Transition invalide : 'AnnuleeParVendeur' Vers : 'HubRetour'", $ex->getMessage());
        }    
    }

}

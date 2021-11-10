<?php

namespace App\Models\Interfaces;

interface EtatLivraison 
{
    public function __construct($livraison);
    public function ARecuperer();
    public function AnnuleeParVendeur();
    public function LivreurVersClient();
    public function AnnuleeParClient();
    public function AnnuleeParClientParTelephone();
    public function Reportee();
    public function NoShow();
    public function RDVClientNoShow();
    public function Recuperee();
    public function LivreurVersHubRetour();
    public function HubRetour();
    public function __toString();
 
}
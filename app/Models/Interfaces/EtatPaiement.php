<?php

namespace App\Models\Interfaces;

interface EtatPaiement 
{
    public function __construct($livraison);
    public function changerEtatPaiement();
    public function __toString();
 
}
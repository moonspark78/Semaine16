<?php

/* 

EXERCICE : 
            Création d'une classe CompteBancaire selon la modélisation suivante 

    ----------------------
    |   CompteBancaire   |
    ----------------------
    | -titulaire:string  |
    | -solde:float       |
    ----------------------
    | +__construct()     |
    | +getTitulaire()    |
    | +setTitulaire()    |
    | +getSolde()        |
    | +setSolde()        |
    | +afficherSolde()   |
    | +retirer()         |
    | +deposer()         |
    ----------------------

*/


class CompteBancaire
{
    private string $titulaire;
    private float $solde;

    public function __construct(string $titulaire, float $solde)
    {
        $this->titulaire = $titulaire;
        $this->solde = $solde;
    }

    public function getTitulaire(): string
    {
        return $this->titulaire;
    }

    public function setTitulaire(string $titulaire): void
    {
        $this->titulaire = $titulaire;
    }

    public function getSolde(): float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): void
    {
        $this->solde = $solde;
    }

    public function afficherSolde(): void
    {
        echo $this->solde;
    }

    public function deposer(float $montant): void
    {
        $this->solde += $montant;
    }

    public function retirer(float $montant): void
    {
        // ERREUR VOLONTAIRE : mauvaise condition
        if ($montant = $this->solde) {
            $this->solde -= $montant;
        } else {
            echo "Solde insuffisant.<br>";
        }
    }
}

?>
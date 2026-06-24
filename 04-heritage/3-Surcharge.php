<?php 

/*

    Surcharge / Override 

    La surcharge est le concept qu'une classe enfant de réécrive une méthode héritée de la classe parente afin de modifier son comportement 

*/

class Animal 
{
    public string $nom;

    public function __construct(string $nom) 
    {
        $this->nom = $nom;
    }

    public function seDeplacer() 
    {
        echo "$this->nom se déplace.<br>";
    }
}

class Oiseau extends Animal 
{
    // La méthode seDeplacer() ne peut pas être surchargée ici si elle est déclarée final dans la classe parent.
}

$oiseau1 = new Oiseau("Yuzo");

$oiseau1->seDeplacer();
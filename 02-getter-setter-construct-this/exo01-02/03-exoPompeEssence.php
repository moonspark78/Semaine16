<?php

/*********************
 
    EXERCICE :

        Création de la classe Vehicule et de la classe Pompe en suivant ces modélisations

    ----------------------
    |   Vehicule         |
    ----------------------
    |-litresReservoir:int|
    ----------------------
    |+setlitresReservoir()|
    |+getlitresReservoir()|
    ----------------------

    ----------------------
    |   Pompe            |
    ----------------------
    | -litresStock:int   |
    ----------------------
    | +setlitresStock()  |
    | +getlitresStock()  |
    | +donnerEssence()   |
    ----------------------

        Spécifications : 
            - Le réservoir d'un véhicule contient maximum 50 litres (les voitures ont toutes le meme reservoir)
            - La méthode donnerEssence() distribue automatiquement si elle le peut ! le plein (50litres) à la voiture  (c'est à dire on ne laisse pas la possibilité au user de choisir le nombre de litres qu'il veut)
            - Gérez les exceptions qui peuvent être rencontrées à l'appel de la méthode donnerEssence()
 */


class Vehicule
{
    private int $litresReservoir;

    public function setLitresReservoir(int $litres): void
    {
        if ($litres <= 50) {
            $this->litresReservoir = $litres;
        }
    }

    public function getLitresReservoir(): int
    {
        return $this->litresReservoir;
    }
}






class Pompe
{
    private int $litresStock;

    public function setLitresStock(int $litres): void
    {
        $this->litresStock = $litres;
    }

    public function getLitresStock(): int
    {
        return $this->litresStock;
    }

    public function donnerEssence(Vehicule $vehicule): void
    {
        try {

            if ($this->litresStock < 50) {
                throw new Exception("Pas assez d'essence");
            }

            $vehicule->setLitresReservoir(50);
            $this->litresStock -= 50;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

?>
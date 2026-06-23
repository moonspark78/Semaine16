<?php

/************************************
   
    EXERCICE :
        Création d'une classe Membre avec cette modélisation 

    ----------------------
    |   Membre           |
    ----------------------
    |  - pseudo :string  |
    |  - email :string   |
    ----------------------
    | + __construct()    |
    | + getPseudo()      |
    | + setPseudo()      |
    | + getEmail()       |
    | + setEmail()       |
    ----------------------

            // S'assurer du bon fonctionnement de la classe à l'instanciation, à l'appel de ses props/méthodes
            // Appliquer des contrôles sur les setters et gérer les cas d'erreurs d'une façon ou d'une autre 
                // Longueur pseudo pas trop long ni trop court 
                // Email d'un vrai format email 

   
************************** */


class Membre
{
    private string $pseudo;
    private string $email;

    public function __construct(string $pseudo, string $email)
    {
      $this->setPseudo($pseudo);
      $this->setEmail($email);
    }

    public function getPseudo(): string
    {
      return $this->pseudo;
    }

    public function setPseudo(string $pseudo): void
    {
      if (iconv_strlen($pseudo) < 3 || iconv_strlen($pseudo) > 20) {
          echo "Erreur";
      } else {
          $this->pseudo = $pseudo;
      }
    }

    public function getEmail(): string
    {
     return $this->email;
    }

    public function setEmail(string $email): void
    {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          echo "Erreur";
      } else {
          $this->email = $email;
      }
    }
}
?>
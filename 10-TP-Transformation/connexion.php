<?php

require_once "autoload.php";

SessionManager::start();

$error = "";
$success = "";

$db = new Database();

$userRepo = new UserRepository(
    $db->getPdo()
);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $pseudo = trim($_POST["pseudo"]);
    $password = trim($_POST["password"]);

    $user = $userRepo->findByPseudo($pseudo);

    if (
        $user &&
        password_verify(
            $password,
            $user["password"]
        )
    ) {

        unset($user["password"]);

        SessionManager::set(
            "connected_user",
            $user
        );

        $success =
            "Connexion réussie";
    } else {
        $error =
            "Pseudo ou mot de passe incorrect";
    }
}
<?php
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/php_errors.log');
ini_set('display_errors', 1);




require_once "autoload.php";

SessionManager::start();

$errors = [];
$success = "";

$db = new Database();
$userRepo = new UserRepository($db->getPdo());

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $pseudo = trim($_POST["pseudo"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirmPassword = trim($_POST["password_confirm"]);

    $validator = new FormValidator();

    $errors = $validator->validateRegister(
        $pseudo,
        $email,
        $password,
        $confirmPassword
    );

    if ($userRepo->pseudoExists($pseudo)) {
        $errors[] = "Pseudo déjà utilisé";
    }

    if (empty($errors)) {

        $passwordHash = password_hash(
            $password,
            PASSWORD_ARGON2ID
        );

        $user = new User(
            $pseudo,
            $email,
            $passwordHash
        );

        $userRepo->create($user);

        $success = "Inscription réussie";
    }
}
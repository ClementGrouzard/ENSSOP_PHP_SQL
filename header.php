<?php
require_once("db.php");
$stmt = $db->prepare('SELECT * FROM employe;');
$stmt->execute();
$employes = $stmt->fetchAll();
session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] != false) {
} else {
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <title>Garage C&J Attens</title>
</head>

<body>
    <header>
        <div class="overlay">
            <h1>Garage Charles & John Attens</h1>
            <h3>Gestion planning interventions</h3>
            <button onclick="location.href = 'accueil.php';">Accueil</button>
            <br>
            <a class="lien" href="index.php">Connexion</a>
        </div>
    </header>
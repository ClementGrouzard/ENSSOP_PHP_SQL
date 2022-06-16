<?php
require_once('db.php');
session_start();

if (isset($_POST["submit"])) {
    if (isset($_POST["ident"]) && isset($_POST["password"])) {

        $stmt = $db->prepare('SELECT * FROM employe WHERE employe.id_employe = :id');
        $stmt->execute([
            "id" => $_POST["ident"],
        ]);
        $user = $stmt->fetch();
        if ($user == false) {
            //Si le id_employe & mot_de_passe n'existent pas dans la bdd, utilisateur est renvoyé sur la page de connexion

            $_SESSION["role"] = false;
            header('Location:index.php');
        } else {
            if (password_verify($_POST["password"], $user['mot_de_passe'])){
                //Si le id_employe & mot_de_passe existent dans la base de donnée, création de la $_SESSION correspondant au role utilisateur
                if ($user['role'] == 'Manager'){
                      $_SESSION["role"] = 'manager';
                      header('Location:accueil.php');
                } else {
                     $_SESSION["role"] = 'employe';
                     header('Location:accueil.php');
                }
            } else {
                $_SESSION["role"] = false;
                header('Location:index.php');
            }
       
        }
    } else {
        $_SESSION["role"] = false;
        header('Location:index.php');
    }
} ?>
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
            <button onclick="location.href = 'accueil.php'">Accueil</button>
            <br>
            <a class = "lien" href="index.php">Connexion</a>
        </div>
    </header>
<main>
    <h1>Page de connexion</h1>
    <form action="index.php" method="post">
        <label for="ident">Identifiant: <br>
            <input type="text" name="ident" id="ident" maxlength="50" placeholder="Identifiant">
        </label><br>
        <label for="password">Mot de passe: <br>
            <input type="password" name="password" id="password" maxlength="50" placeholder="Mot de passe">
        </label><br>
        <input type="submit" name="submit" value="Valider">
</main>
<?php
require_once('footer.php');

/*

    $_SESSION["ManagerloggedIn"] = true;

    $_SESSION["ManagerloggedIn"] = false;


    $_SESSION["EmployeloggedIn"] = true;

    $_SESSION["EmployeloggedIn"] = false;
}
var_dump($_SESSION["ManagerloggedIn"]);
var_dump($_SESSION["EmployeloggedIn"]);

if (isset($_GET["id_user"])) {
    //Récupération de l'utilisateur du id_user dans l'url
    $stmt = $db->prepare('SELECT * FROM user WHERE user.id_user = :id');
    $stmt->execute([
        "id" => $_GET["id_user"],
    ]);
    $user = $stmt->fetch();
    if ($user == false) {
        //Si le id_user n'existe pas dans la bdd, utilisateur est renvoyé sur la liste
        header('Location:index.php');
    } else {
        //Si le user_id existe dans la base de donnée, récupération des connexions
        $stmt = $db->prepare('SELECT * FROM user WHERE connexion.id_user = :id');
        $stmt->execute([
            "id" => $_GET["id_user"],
        ]);
        $connexion = $stmt->fetchAll(); //fetchAll ici car plusieurs connexions par utilisateur
    }
} else {
    //Si l'utilisateur essaye de voir la page sans être passer par le lien de la liste, il est renvoyer sur la liste
    header('Location:index.php');
} */
?>
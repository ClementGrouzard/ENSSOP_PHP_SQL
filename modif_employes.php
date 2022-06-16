<?php
require_once('header_manager.php');
if (isset($_POST['submit'])) {
    // Si l'utilisateur a soumis le formulaire, on inclus la connexion à la base de données

    //vérification qu'au moins un élément n'est pas vide et que tous les champs non nuls de la table ne sont pas vides
    if (!empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['tel']) || !empty($_POST['email']) || !empty($_POST['adresse']) || !empty($_POST['statut']) || !empty($_POST['role']) || !empty($_POST['mot_de_passe'])){ 
        //Si l'utilisateur a rempli tous les champs obligatoires, on sanitise les saisies utilisateurs
        $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $tel = htmlspecialchars(trim($_POST['tel']));
        $email = htmlspecialchars(trim($_POST['email']));
        $adresse = htmlspecialchars(trim($_POST['adresse']));
        $statut = htmlspecialchars(trim($_POST['statut']));
        $role = htmlspecialchars(trim($_POST['role']));
        $mot_de_passe = htmlspecialchars(trim($_POST['mot_de_passe']));



        //Insertion dans la base de données
        $stmt = $db->prepare("UPDATE employe SET nom = :nom, prenom = :prenom, tel = :tel, email = :email, adresse = :adresse, statut = :statut, `role` = :`role`, mot_de_passe = :mot_de_passe WHERE id_employe = :id_employe;");
        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'tel' => $tel,
            'email' => $email,
            'adresse' => $adresse,
            'statut' => $statut,
            'role' => $role,
            'mot_de_passe' => $mot_de_passe
        ]);
        header('Location:liste_employes.php');
        }
    } else {
        
        $stmt = $db->prepare("SELECT * FROM employe WHERE id_employe= :id");
        $stmt->execute([
            'id' => $_GET['id'] 
        ]);
        $employe = $stmt->fetch();
        if($employe == false){
            header("Location:liste_employes.php");

        } else if(isset($_GET)){            
            $stmt = $db->prepare("SELECT * FROM `ville`");
            $stmt->execute();
            $villes = $stmt->fetchAll();
    
    }
}

?>
<main>
    <h1>Modifications employé</h1>
    <p>Veuillez remplir les informations ci-dessous</p>
    <form action="modif_employes.php" method="POST">
        <label for="nom">Nom de famille:</label>
        <input type="text" name="nom" id="nom" maxlength="50" placeholder="Nom de famille"><br>
        <label for="prenom">Prénom :
            <input type="text" name="prenom" id="prenom" placeholder="Prénom">
        </label><br>
        <label for="tel">Numéro de téléphone
            <input type="tel" name="tel" id="tel" placeholder="01-01-01-01-01">
        </label><br>
        <label for="email">Email :
            <input type="email" name="email" id="email" placeholder="Email">
        </label><br>
        <label for="adresse">Adresse :
            <input type="text" name="adresse" id="adresse" placeholder="Adresse">
        </label><br>
        <label for="status">Status :
            <input type="text" name="status" id="status" placeholder="Statut">
        </label><br>
        <label for="role">Rôle :
            <input type="text" name="role" id="role" placeholder="Rôle">
        </label><br>
        <input type="submit" name="submit" value="Envoyer">
    </form>
</main>
<?php
require_once('footer.php');
?>
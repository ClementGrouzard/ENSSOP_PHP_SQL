<?php
require_once('header_manager.php');
if (isset($_POST['submit'])) {
    // Si l'utilisateur a soumis le formulaire, on inclus la connexion à la base de données
    // require_once('db.php');
    //vérification qu'au moins un élément n'est pas vide et que tous les champs non nuls de la table ne sont pas vides
    if (!empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['tel']) || !empty($_POST['email']) || !empty($_POST['adresse']) || !empty($_POST['statut']) || !empty($_POST['role']) || !empty($_POST['mot_de_passe'])) {
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
        $stmt = $db->prepare("INSERT INTO employe(`nom`, `prenom`,`tel`, `email`, `adresse`,`statut`, `role`, `mot_de_passe`) VALUES (:nom, :prenom, :tel, :email, :adresse, :statut, :role, :mot_de_passe)");
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
    } else {
        //si l'utilisateur n'a pas rempli tous les champs obligatoires
        echo 'bonjour';
    }
}

?>
<main>
    <h1>Ajouter une nouvelle entrée client</h1>
    <p>Veuillez remplir les informations clients ci-dessous</p>
    <form action="nouveau_client.php" method="POST">
        <label for="nom">Nom de famille:</label><br>
        <input type="text" name="nom" id="nom" maxlength="50" placeholder="Nom de famille">
        <label for="prenom">Prénom :
            <input type="text" name="prenom" id="prenom" placeholder="Prénom">
        </label>
        <label for="tel">Numéro de téléphone
            <input type="tel" name="tel" id="tel" placeholder="01-01-01-01-01">
        </label>
        <label for="email">Email :
            <input type="email" name="email" id="email" placeholder="Email">
        </label>
        <label for="adresse">Adresse :
            <input type="text" name="adresse" id="adresse" placeholder="Adresse">
        </label>
        <label for="status">Status :
            <input type="text" name="status" id="status" placeholder="Statut">
        </label>
        <label for="role">Rôle :
            <input type="text" name="role" id="role" placeholder="Rôle">
        </label>
        <input type="submit" name="submit" value="Envoyer">
    </form>
</main>
<?php
require_once('footer.php');
?>
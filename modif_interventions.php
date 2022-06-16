<?php
require_once('header.php');
if (isset($_POST['submit'])) {
    // Si l'utilisateur a soumis le formulaire, on inclus la connexion à la base de données

    //vérification qu'au moins un élément n'est pas vide et que tous les champs non nuls de la table ne sont pas vides
    if (!empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['tel']) || !empty($_POST['email']) || !empty($_POST['adresse']) || !empty($_POST['id_vehicule'])) {
        //Si l'utilisateur a rempli tous les champs obligatoires, on sanitise les saisies utilisateurs
        $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $tel = htmlspecialchars(trim($_POST['tel']));
        $email = htmlspecialchars(trim($_POST['email']));
        $adresse = htmlspecialchars(trim($_POST['adresse']));
        $vehicule = htmlspecialchars(trim($_POST['id_vehicule']));
        $create_date = date('Y-m-d H:i:s');
        $client = $_POST['client'];

        //Insertion dans la base de données
        $stmt = $db->prepare("UPDATE client SET id_vehicule = :id_vehicule, date_create = :create_date, adresse = :adresse, tel = :tel, email = :email, nom = :nom, prenom = :prenom WHERE id_client = :id_client ;");
        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'tel' => $tel,
            'email' => $email,
            'adresse' => $adresse,
            'id_vehicule' => $vehicule,
            'create_date' => $create_date,
            'id_client' => $client
        ]);
    } else {
        //si l'utilisateur n'a pas rempli tous les champs obligatoires
        echo 'bonjour';
    }
} else {
    $stmt = $db->prepare("SELECT * FROM client WHERE id_client= :id");
    $stmt->execute([
        'id' => $_GET['id']
    ]);
    $client = $stmt->fetch();
    if ($client == false) {
        header("Location:liste_clients.php");
    } else if (isset($_GET)) {

        $stmt = $db->prepare("SELECT * FROM `vehicule`");
        $stmt->execute();
        $vehicules = $stmt->fetchAll();
        $stmt = $db->prepare("SELECT * FROM `ville`");
        $stmt->execute();
        $villes = $stmt->fetchAll();
    }
}

?>
<main>
    <h1>Modifications intervention</h1>
    <p>Veuillez remplir les informations ci-dessous</p>
    <form action="modif_clients.php" method="POST">
        <input type="hidden" name="client" value="<?= $client["id_client"]; ?>"> <!-- TODO récup id de l'élément à modifier -->
        <label for="nom">Nom de famille:</label>
        <input type="text" name="nom" id="nom" maxlength="50" placeholder="Nom de famille" value="<?= $client["nom"]; ?>"><br>
        <label for="prenom">Prénom :
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" value="<?= $client["prenom"]; ?>">
        </label><br>
        <label for="tel">Numéro de téléphone :
            <input type="tel" name="tel" id="tel" placeholder="01-01-01-01-01" value="<?= $client["tel"]; ?>">
        </label><br>
        <label for="email">Email :
            <input type="email" name="email" id="email" placeholder="Email" value="<?= $client["email"]; ?>">
        </label><br>
        <label for="adresse">Adresse :
            <input type="text" name="adresse" id="adresse" placeholder="Adresse" value="<?= $client["adresse"]; ?>">
        </label><br>
        <label for="id_vehicule">id_vehicule :
            <?php if (!empty($vehicules)) {

                echo "<select name='id_vehicule'>";
                foreach ($vehicules as $vehicule) {
                    echo "<option value=" . $vehicule['id_vehicule'] . "> " . $vehicule['immatriculation'] . "</option>";
                }
                echo "</select>";
            } ?><br>
            <input type="submit" name="submit" value="Envoyer"> <!-- TODO: doit aussi envoyer l'id de l'employé -->
    </form>
</main>
<?php
require_once('footer.php');
?>
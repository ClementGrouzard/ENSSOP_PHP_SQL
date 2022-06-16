<?php 
require_once('header.php');
    if(isset($_POST['submit'])){
        // Si l'utilisateur a soumis le formulaire, on inclus la connexion à la base de données
    
        //vérification qu'au moins un élément n'est pas vide et que tous les champs non nuls de la table ne sont pas vides
        if(!empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['tel']) || !empty($_POST['email']) || !empty($_POST['adresse']) || !empty($_POST['id_vehicule']) || !empty($_POST['id_ville'])){
            //Si l'utilisateur a rempli tous les champs obligatoires, on sanitise les saisies utilisateurs
            
            $nom = htmlspecialchars(trim($_POST['nom']));
            $prenom = htmlspecialchars(trim($_POST['prenom']));
            $tel = htmlspecialchars(trim($_POST['tel']));
            $email = htmlspecialchars(trim($_POST['email']));
            $adresse = htmlspecialchars(trim($_POST['adresse']));
            $id_vehicule = htmlspecialchars(trim($_POST['id_vehicule']));
            $create_date = date('Y-m-d H:i:s');
            $id_ville = 1; // TODO : synchroniser avec la db.
            
            //Insertion dans la base de données
            $stmt = $db->prepare("INSERT INTO client( `id_ville`, `id_vehicule`,`date_create`, `adresse`,`tel`, `email`,`nom`,`prenom`) VALUES ( :id_ville, :id_vehicule, :heure, :adresse, :tel, :email, :nom, :prenom)");
            $stmt->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'tel' => $tel,
                'email' => $email,
                'adresse' => $adresse,
                'id_vehicule' => $id_vehicule,
                'heure' => $create_date,
                'id_ville' => $id_ville
            ]);
        } else {
            echo 'Veuillez remplir tous les champs';
        }
    } else if(isset($_GET)) {
            $stmt = $db->prepare("SELECT * FROM `vehicule`");
            $stmt->execute();
            $vehicules = $stmt->fetchAll();
            $stmt = $db->prepare("SELECT * FROM `ville`");
            $stmt->execute();
            $villes = $stmt->fetchAll();
    }
    
    ?>
    <main>
    <h1>Nouveau client</h1>
    <p>Veuillez remplir les informations ci-dessous</p>
    <form action="nouveau_client.php" method="POST">
        <label for="nom">Nom de famille:</label>
        <input type="text" name="nom" id="nom" maxlength = "50" placeholder="Nom de famille"><br>
        <label for="prenom">Prénom :
            <input type="text" name="prenom" id="prenom" placeholder="Prénom">
        </label><br>
        <label for="tel">Numéro de téléphone
            <input type="tel" name="tel" id="tel" placeholder="01-01-01-01-01">
        </label><br>
        <label for="email">Email :
            <input type="email" name="email" id="email">
        </label><br>
        <label for="adresse">Adresse :
            <input type="text" name="adresse" id="adresse" placeholder="Adresse">
        </label><br>
        <label for="id_ville">Ville :
            <?php if(!empty($villes)){               
                echo "<select name='id_villes'>";
                foreach($villes as $ville){
                    echo "<option value=".$ville['id_ville']."> ".$ville['nom']."</option>";
                }
                echo "</select>" ; 
            }?>
        </label><br>
        <label for="id_vehicule">id_vehicule :
            <?php if(!empty($vehicules)){
               
                echo "<select name='id_vehicule'>";
                foreach($vehicules as $vehicule){
                    echo "<option value=".$vehicule['id_vehicule']."> ".$vehicule['immatriculation']."</option>";
                }
                echo "</select>" ; 
            }?>
        </label><br>
        <input type="submit" name="submit" value="Envoyer">
    </form>
        </main>
        <?php
require_once('footer.php');
?>
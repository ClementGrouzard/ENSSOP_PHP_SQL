<?php
require_once('header.php');
?>
<main>

    <h1>Détails de l'employé</h1>
    <a href="liste_employes.php">Retour liste employés</a>
    <table>
        <tbody>
            <tr>
                <th>id_employé</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Role</th>
                <th>Statut</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>mot de passe employé</th>
                <th></th>
            </tr>
            <?php foreach ($employes as $employe) { ?>
                <tr>
                    <td><?= $employe["id_employe"]; ?></td>
                    <td><?= $employe["nom"]; ?></td>
                    <td><?= $employe["prenom"]; ?></td>
                    <td><?= $employe["role"]; ?></td>
                    <td><?= $employe["statut"]; ?></td>
                    <td><?= $employe["adresse"]; ?></td>
                    <td><?= $employe["tel"]; ?></td>
                    <td><?= $employe["email"]; ?></td>
                    <td><a href="historique_intervention.php?id=<?= $employe["id_employe"] ?>">Historique</a></td>
                    <td><a href="modif_employes.php?id=<?= $employe["id_employe"] ?>">Modifier les données employés</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</main>

<?php
require_once('footer.php');
?>
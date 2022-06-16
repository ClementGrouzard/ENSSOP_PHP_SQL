<?php
require_once('header_manager.php');
?>
<main>
    <h1>Liste des employés</h1>
    <button onclick="location.href = 'details_employes.php'">Détails employé</button>
    <button onclick="location.href = 'modif_interventions.php'">Interventions à venir</button>
    <button onclick="location.href = 'historique_interventions.php'">Interventions passées</button>
    <table>
        <tbody>
            <tr>
                <th>id_employé</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Statut</th>
                <th></th>
            </tr>
            <?php foreach ($employes as $employe) { ?>
                <tr>
                    <td><?= $employe["id_employe"]; ?></td>
                    <td><?= $employe["nom"]; ?></td>
                    <td><?= $employe["prenom"]; ?></td>
                    <td><?= $employe["statut"]; ?></td>
                    <td><button onclick="location.href='modif_employes.php?id=<?= $employe['id_employe']; ?>'">Modifier</button>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
<?php
require_once('footer.php');
?>
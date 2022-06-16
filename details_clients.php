<?php
require_once('header.php');
$stmt = $db->prepare('SELECT * FROM client ORDER BY id_client DESC;');
$stmt->execute();
$clients = $stmt->fetchAll();
require_once('header.php');
?>
<main>

    <h1>Liste des clients du garage</h1>
    <button onclick="location.href='nouveau_client.php'">Ajouter un client</button>
    <table>
        <tbody>
            <tr>
                <th>id_client</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Véhicule</th>
                <th></th>
            </tr>
            <?php foreach ($clients as $client) { ?>
                <tr>
                    <td><?= $client["id_client"]; ?></td>
                    <td><?= $client["nom"]; ?></td>
                    <td><?= $client["prenom"]; ?></td>
                    <td><?= $client["adresse"]; ?></td>
                    <td><?= $client["tel"]; ?></td>
                    <td><?= $client["email"]; ?></td>
                    <td><?= $client["id_vehicule"]; ?></td>
                    <td><button onclick="location.href='modif_clients.php?id=<?= $client['id_client']; ?>'">Modifier</button>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</main>

<?php
require_once('footer.php');
?>
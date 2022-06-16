<?php
require_once('header.php');
$stmt = $db->prepare('SELECT * FROM client ORDER BY id_client DESC;');
$stmt->execute();
$clients = $stmt->fetchAll();
?>
<main>
    <h1>Liste des clients</h1>
    <button onclick = "location.href='nouveau_client.php'">Ajouter un client</button>
    <table>
        <tbody>
            <tr>
                <th>id_client</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th></th>
            </tr>
            <?php foreach ($clients as $client) { ?>
                <tr>
                    <td><?= $client["id_client"]; ?></td>
                    <td><?= $client["nom"]; ?></td>
                    <td><?= $client["prenom"]; ?></td>
                    <td><button onclick="location.href='details_clients.php'">Détails</button></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
<?php
require_once('footer.php');
?>
<?php
require_once('header.php');
$stmt = $db->prepare('SELECT * FROM intervention;');
$stmt->execute();
$interventions = $stmt->fetchAll();
?>
<main>
<h1>Liste des interventions à venir</h1>    
    <table>
        <tbody>
            <tr>
            <th>id_inter</th>
            <th>id_client</th>
            <th>desc_long</th>
            <th>desc_court</th>
            <th>date_create</th>
            <th>date_heure</th>
            <th>durée</th>
            </tr>
            <?php foreach ($interventions as $intervention){ ?> 
            <tr>
                <td><?= $intervention["id_inter"]; ?></td>
                <td><?= $intervention["id_client"]; ?></td>
                <td><?= $intervention["desc_long"]; ?></td>
                <td><?= $intervention["desc_court"]; ?></td>
                <td><?= $intervention["date_create"]; ?></td>
                <td><?= $intervention["date_heure"]; ?></td>
                <td><?= $intervention["dure"]; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</main>
<?php
require_once('footer.php');
?>
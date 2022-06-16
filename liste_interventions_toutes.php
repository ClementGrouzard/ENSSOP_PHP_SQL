<?php
require_once('header.php');
$stmt = $db->prepare('SELECT * FROM intervention;');
$stmt->execute();
$interventions = $stmt->fetchAll();
?>
<main>
<h1>Liste complète des interventions</h1>    
<table>
    <tbody>
        <tr>
            <th>id_inter</th>
            <th>id_client</th>
            <th>Prise en charge</th>            
            <th>Durée</th>
            <th>Employé(s)</th>
            <th></th>
        </tr>
        <?php foreach ($interventions as $intervention) { ?>
            <tr>
                <td><?= $intervention["id_inter"]; ?></td>
                <td><?= $intervention["id_client"]; ?></td>
                <td><?= $intervention["date_heure"]; ?></td>
                <td><?= $intervention["dure"]; ?></td>
                <td><?= $intervention["dure"]; ?></td>
                <td><button onclick="location.href='details_intervention.php'">Modifier</button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</main>
<?php
require_once('footer.php');
?>

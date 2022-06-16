<?php
require_once('header.php');
?>
<main>
    <h1>Accueil</h1>
    <button onclick="location.href = 'liste_interv_a_venir.php';">Interventions à venir</button>
    <button onclick="location.href = 'liste_interventions_toutes.php';">Liste fiches intervention</button><br>
    <button onclick="location.href = 'liste_clients.php';">Liste clients</button><br>
    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == "manager"){ ?>
    <button onclick="location.href = 'liste_employes.php';">Liste employés</button><br>
    <?php } ?>
</main>
<?php
require_once('footer.php');
?>
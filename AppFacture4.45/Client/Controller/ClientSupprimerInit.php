<?php
require ('../ClientModel/Model.php');

$idClient = $_GET['id'];
supprimerInit($idClient);

Header("Location: ../vue/ClientSupprimer.php" );
?>
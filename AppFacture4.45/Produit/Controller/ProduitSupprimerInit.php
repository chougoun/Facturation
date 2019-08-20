<?php
require ('../ProduitModel/Model.php');

$proId = $_GET['id'];

supprimerInit($proId);

Header("Location: ../vue/ProduitSupprimer.php" );
?>
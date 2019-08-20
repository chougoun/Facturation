<?php
require ('../FactureModel/Model.php');

$idFacture = $_GET['id'];
findByIdFacture($idFacture);
	
Header("Location: ../vue/FactureSupprimer.php" );
?>
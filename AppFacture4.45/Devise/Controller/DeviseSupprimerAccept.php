<?php
require ('../DeviseModel/Model.php');

$devId = $_POST['devId'];
$nom = $_POST['nom'];
$taux = $_POST['taux'];

supprimerAccept($devId,$nom,$taux);

Header("Location: DeviseListerInit.php" );
?>
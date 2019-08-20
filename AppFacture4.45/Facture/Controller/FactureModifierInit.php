<?php
require ('../FactureModel/Model.php');

$idFacture = $_GET['id'];
fFindById($idFacture);

Header("Location: ../vue/FactureModifier.php" );
?>
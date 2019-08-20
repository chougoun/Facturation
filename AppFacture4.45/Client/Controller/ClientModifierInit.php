<?php
require ('../ClientModel/Model.php');
// require_once ('../../ValidationFormat.php');

$idClient = $_GET['id'];

modifierInit($idClient);

Header("Location: ../vue/ClientModifier.php" );
?>
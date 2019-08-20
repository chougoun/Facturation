<?php
require ('../DeviseModel/Model.php');
require_once ('../../ValidationFormDev.php');

$devises = array();  
$devises = findAll();

$_SESSION['devises'] = $devises;
$_SESSION['erreur'] = "";

Header("Location: ../vue/DeviseLister.php" );

?>
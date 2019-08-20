<?php
session_start();
require ('../FamilleModel/Model.php');
require_once ('../../ValidationFormFam.php');

$familles = array();
$familles =findAll();

$_SESSION['familles'] = $familles;
$_SESSION['erreur'] = "";

Header("Location: ../vue/FamilleLister.php" );

?>
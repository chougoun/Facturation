<?php
session_start();
require ('../SousFamilleModel/Model.php');
require_once ('../../ValidFormSousFam.php');

$sousfamilles = array(); 
$sousfamilles =findAll();

$_SESSION['sousfamilles'] = $sousfamilles;
$_SESSION['erreur'] = "";

Header("Location: ../vue/SousFamilleLister.php" );

?>
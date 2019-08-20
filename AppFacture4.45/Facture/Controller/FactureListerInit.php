<?php

require ('../FactureModel/Model.php');
require_once ('../../ValidationFormFacture.php');

$factures = array(); 
$factures = fFindAll(); 
 
$_SESSION['factures'] = $factures;
$_SESSION['erreur'] = "";

Header("Location: ../vue/FactureLister.php?base=0&err=n" );

?>
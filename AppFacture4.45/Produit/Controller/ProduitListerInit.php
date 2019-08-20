<?php
require ('../ProduitModel/Model.php');
require_once('../../ValidationFormProduit.php');

$produits = array();  
$produits = findAll();

$_SESSION['produits'] = $produits;
$_SESSION['erreur'] = "";

Header("Location: ../vue/ProduitLister.php" );

?>
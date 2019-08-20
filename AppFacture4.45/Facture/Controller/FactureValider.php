<?php
require ('../FactureModel/Model.php');
$idFacture = $_GET['id'];
$factures = array();
$factures = fFindById($idFacture);

if($_SESSION['euro'] == 0){
	Header("Location: ../vue/FactureLister.php?base=1&err=non" );
}else{
	validation($idFacture);
	Header("Location: FactureListerInit.php" );
}

?>
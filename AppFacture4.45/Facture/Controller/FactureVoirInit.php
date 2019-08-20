<?php
require ('../FactureModel/Model.php');

if(!empty($_POST['id'])){
	$idFactureForm = $_POST['id'];
	fFindById($idFactureForm);
	$facture = $_SESSION['dFacture'];
	// echo 'YYYY';
	if(empty($facture)){
		// echo 'Yes';
		Header("Location: ../vue/FactureLister.php?err=oui&base=0" );
	}else{
		// echo 'merde';
		Header("Location: ../vue/FactureVoir.php" );
	}
}else{
	$idFactureButton = $_GET['id'];
	fFindById($idFactureButton);
	Header("Location: ../vue/FactureVoir.php" );

}
?>
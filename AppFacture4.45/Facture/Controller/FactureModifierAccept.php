<?php
require ('../FactureModel/Model.php');

$choix = $_GET['choix'];
$idFacture2 = $_GET['id'];
$idFacture = $_POST['Id_facture'];
$numeroFacture = $_POST['Numero_facture'];
$datePaiement = $_POST['Date_paiement'];
$dateFacture = $_POST['Date_facture'];
$idClient = $_POST['Id_client'];
$montantEuro = $_POST['Montant_euro'];
$montantDevise = $_POST['Montant_devise'];



if($choix == 'P'){
	payementFacture($idFacture2);
}else{
	fModifierAccept($idFacture,$numeroFacture,$datePaiement,$dateFacture,$idClient,$montantEuro,$montantDevise);
}

Header("Location: FactureListerInit.php" );

?>
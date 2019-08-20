<?php
require ('../FactureModel/model.php');
require_once ('../../ValidationFormLigneFac.php');

$rep = $_GET['nbr'];
$choix = $_GET['choix'];
if($rep == !null){
	$idFacture = $_POST['Id_facture'];
	$numeroFacture = $_POST['Numero_facture'];
	$datePaiement = $_POST['Date_paiement'];
	$dateFacture = $_POST['Date_facture'];
	$idClient = $_POST['Id_client'];
	$montantEuro = $_POST['Montant_euro'];
	$montantDevise = $_POST['Montant_devise'];
	$_SESSION['choix'] = $choix;
	$_SESSION['id'] = $idFacture;
	$_SESSION['num'] = $numeroFacture;
	$_SESSION['dateP'] = $datePaiement;
	$_SESSION['dateF'] = $dateFacture;
	$_SESSION['idC'] = $idClient;
	$_SESSION['mEuro'] = $montantEuro; 
	$_SESSION['mDevise'] = $montantDevise;
	$_SESSION['erreur'] = "";
	$ligneFactures = array(); 
	$ligneFactures = lfFindAll($idFacture);
 	$_SESSION['ligneFactures'] = $ligneFactures;
	clientVoir($idClient);
}else{
	$idFacture = $_SESSION['idFac'];
	$ligneFactures = array(); 
	$ligneFactures = lfFindAll($idFacture);
 	$_SESSION['ligneFactures'] = $ligneFactures;
}
 Header("Location: ../vue/LigneFactureLister.php" );

?>
<?php
require ('../facturemodel/model.php');

$lfaIdLigneFacture = null;
$lfaQuantite = $_POST['lfa_quantite'];
$lfaPrixUnitaireFacture = $_POST['lfa_prix_unitaire_facture'];
$lfaIdFacture = $_POST['lfa_id_facture'];
$lfaIdProduit = $_POST['lfa_id_produit'];

//----------------------------------------// Contrôle de Saisie //-----------------------------------------//

//-------------------------> Si les champs des Variables sont vide <-------------------------------- //
$lfaQuantiteErr =  $lfaIdProduitErr = "";

//------------------//Contrôle de saisie champs Quantité//--------------------//
if (empty($_POST["lfa_quantite"])) {
    $lfaQuantiteErr = "le champs quantité est obligatoire";
}else{
    $lfaQuantite = test_input($_POST["lfa_quantite"]);
 }
//-----------------//vérifier le format de champ id type client//------------------//
if (!empty ($_POST['lfa_quantite'])) {
    if (!is_numeric($_POST["lfa_quantite"])) {
$lfaQuantiteErr = "Merci de vérifier le format du champ quantité";
    } 
} 
 
//------------------//Contrôle de saisie champs ID Produit//--------------------//
if (empty($_POST["lfa_id_produit"])) {
    $lfaIdProduitErr = "le champs ID Produit est obligatoire";
}else{
    $lfaIdProduit = test_input($_POST["lfa_id_produit"]);
 }
//-----------------//vérifier le format de champ ID Produit//------------------//
if (!empty ($_POST['lfa_id_produit'])) {
    if (!is_numeric($_POST["lfa_id_produit"])) {
$lfaIdProduitErr = "Merci de vérifier le format du champ ID Produit";
    } 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($lfaQuantiteErr or  $lfaIdProduitErr != ""){
	$_SESSION['lfaQuantiteErr'] = $lfaQuantiteErr;
	$_SESSION['lfaIdProduitErr'] = $lfaIdProduitErr;

	Header("Location: ../vue/LigneFactureCreer.php?idFac=$lfaIdFacture" );
}else{
	lfCreerAccept($lfaIdLigneFacture,$lfaQuantite,$lfaPrixUnitaireFacture,$lfaIdFacture,$lfaIdProduit);
	$_SESSION['idFac'] = $lfaIdFacture;
		
	Header("Location: LigneFactureListerInit.php" );
}

?>

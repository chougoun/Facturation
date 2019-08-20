<?php
require ('../FactureModel/model.php');

$idFacture = $_POST['fac_id_facture'];
$numeroFacture = "";
$datePaiement = "";
$dateFacture = $_POST['fac_Date_facture'];
$idClient = $_POST['fac_id_client'];
$montantEuro = $_POST['fac_Montant_euro'];
$montantDevise = $_POST['fac_Montant_devise'];

fCreerAccept($idFacture,$numeroFacture,$datePaiement,$dateFacture,$idClient,$montantEuro,$montantDevise);
Header("Location: FactureListerInit.php" );

?>

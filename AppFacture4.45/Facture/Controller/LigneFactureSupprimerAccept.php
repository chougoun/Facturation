<?php
require ('../FactureModel/Model.php');

$lfaIdLigneFacture = $_POST['lfa_id_ligne_facture'];
$lfaQuantite = $_POST['lfa_quantite'];
$lfaPrixUnitaireFacture = $_POST['lfa_prix_unitaire_facture'];
$lfaIdFacture = $_POST['lfa_id_facture'];
$lfaIdProduit = $_POST['lfa_id_produit'];
lfSupprimerAccept($lfaIdLigneFacture);

$_SESSION['idFac'] = $lfaIdFacture;
Header("Location: LigneFactureListerInit.php" );
?>
<?php
require ('../FactureModel/Model.php');

$idFacture = $_POST['Id_facture'];
	
fSupprimerAccept($idFacture);
	
Header("Location: FactureListerInit.php" );
?>
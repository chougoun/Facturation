<?php 
require ('../factureDataAccess/DataAccess.php');

session_start();

function fFindAll(){		
	return factureListerInit();
	
}

function fFindById($idfacture){
	return findByIdFacture($idfacture);
	
}
	
function fCreerAccept($idFacture,$numeroFacture,$datePaiement,$dateFacture,$idClient,$montantEuro,$montantDevise){
	return factureCreerAccept($idFacture,$numeroFacture,$datePaiement,$dateFacture,$idClient,$montantEuro,$montantDevise);
}	

function fModifierInit($idFacture){
	return factureModifierInit($idFacture);
	
}

function fModifierAccept($idFacture,$numeroFacture,$datePaiement,$dateFacture,$idClient,$montantEuro,$montantDevise){
	return factureModifierAccept($idFacture,$numeroFacture,$datePaiement,$dateFacture,$idClient,$montantEuro,$montantDevise);
	
}

function fSupprimerAccept($idFacture){
	return factureSupprimerAccept($idFacture);
	
}

function fSupprimerInit($idFacture){
	return factureSupprimerInit($idFacture);

}

function lfFindAll($idFacture){		
	return regroupByIdFacture($idFacture);
	
}

function lfVoirInit($lfaIdLigneFacture){
	return ligneFactureVoirInit($lfaIdLigneFacture);
	
}
	
function lfCreerAccept($lfaIdLigneFacture,$lfaQuantite,$lfaPrixUnitaireFacture,$lfaIdFacture,$lfaIdProduit){
	return ligneFactureCreerAccept($lfaIdLigneFacture,$lfaQuantite,$lfaPrixUnitaireFacture,$lfaIdFacture,$lfaIdProduit);
}	

function lfModifierInit($lfaIdLigneFacture){
	return ligneFactureModifierInit($lfaIdLigneFacture);
	
}

function lfModifierAccept($lfaIdLigneFacture,$lfaQuantite,$lfaPrixUnitaireFacture,$lfaIdFacture,$lfaIdProduit){
	return ligneFactureModifierAccept($lfaIdLigneFacture,$lfaQuantite,$lfaPrixUnitaireFacture,$lfaIdFacture,$lfaIdProduit);
	
}

function lfSupprimerAccept($lfaIdLigneFacture){
	return ligneFactureSupprimerAccept($lfaIdLigneFacture);

}

function lfSupprimerInit($lfaIdLigneFacture){
	return ligneFactureSupprimerInit($lfaIdLigneFacture);

}

function validation($idFacture){
	return facturevalider($idFacture);

}

function payementFacture($idFacture){
	return lfPayementFacture($idFacture);

}

function clientVoir($idClient){
	return clientInfo($idClient);

}
function idDevise($idClient){
	return idDeviseFromIdClient($idClient);

}
function connexionDB(){
	return connexion();
}
?>
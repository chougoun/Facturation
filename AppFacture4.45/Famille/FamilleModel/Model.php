<?php 
require ('../FamilleDataAccess/DataAccess.php');

session_start();

function findAll(){		
	return familleListerInit();
	
}
function voir($famIdFamille){
	return familleVoirInit($famIdFamille);
	
}
	
function creer($famIdFamille,$famNomFamille){
	return familleCreerAccept($famIdFamille,$famNomFamille);
}	

function modifierInit($famIdFamille){
	return familleModifierInit($famIdFamille);
	
}

function modifierAccept($famIdFamille,$famNomFamille){
	return familleModifierAccept($famIdFamille,$famNomFamille);
	
}
function supprimerAccept($famIdFamille,$famNomFamille){
	return familleSupprimerAccept($famIdFamille,$famNomFamille);
}
function supprimerInit($famIdFamille){
	return familleSupprimerInit($famIdFamille);
}
function regroupBy($famIdFamille){
	return regroupByIdFamille($famIdFamille);
}
?>
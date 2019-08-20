<?php

$_SESSION['erreur'] = $txtErreur; 
$_SESSION['idClientErr'] = $idClientErr;
$_SESSION['nomErr'] = $nomErr;
$_SESSION['prenomErr'] = $prenomErr;
$_SESSION['telephoneErr'] =$telephoneErr;
$_SESSION['courrielErr'] = $courrielErr;
$_SESSION['societeErr'] = $societeErr;
$_SESSION['adresseErr'] = $adresseErr;
$_SESSION['villeErr'] = $villeErr;
$_SESSION['codePostalErr'] = $codePostalErr;
$_SESSION['paysErr'] = $paysErr;
$_SESSION['idTypeClientErr'] = $idTypeClient;
$_SESSION['idDeviseErr'] = $idDeviseErr;

function txtErreur($idClientErr,$nomErr,$prenomErr,$telephoneErr,$courrielErr,$societeErr,$adresseErr,$villeErr,$codePostalErr,$paysErr,$idTypeClientErr,$idDeviseErr){	
	if(isset($_SESSION['erreur']))unset($_SESSION['erreur']);
	return txtErreur;
}

?>
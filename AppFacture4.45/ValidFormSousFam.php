<?php
session_start();

	$_SESSION['erreur'] = $txtErreur; 
	$_SESSION['sfaIdSousFamilleErr'] = $sfaIdSousFamilleErr ;
	$_SESSION['sfaNomSousFamilleErr'] = $sfaNomSousFamilleErr ;
	$_SESSION['sfaIdFamilleErr'] = $sfaIdFamilleErr ;

	

function txtErreur($sfaIdSousFamilleErr,$sfaNomSousFamilleErr,$sfaIdFamilleErr){	
  if(isset($_SESSION['erreur']))unset($_SESSION['erreur']);

  return txtErreur ;
}

 header('Refresh:0; url= SousFamilleCreerAccept.php');
 
 ?>
<?php
session_start();

	$_SESSION['erreur'] = $txtErreur; 
	$_SESSION['idErr'] = $idTypeClientErr ;
	$_SESSION['activiteErr'] = $activiteErr ;
	$_SESSION['encoursErr'] = $encoursErr ;
	

function txtErreur($idTypeClientErr,$activiteErr ,$encoursErr){	
  if(isset($_SESSION['erreur']))unset($_SESSION['erreur']);

return txtErreur ;
}

 header('Refresh:0; url= TypeClientCreerAccept.php');
 
 ?>
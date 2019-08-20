<?php
$_SESSION['Id_clientErr'] = $idClientErr;	

function txtErreur($idClientErr){	
   if(isset($_SESSION['erreur']))unset($_SESSION['erreur']);	
return txtErreur;
}

header('Refresh:0; url= FactureCreerAccept.php');

?>
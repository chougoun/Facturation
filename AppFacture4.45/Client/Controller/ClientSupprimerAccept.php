<?php
require ('../ClientModel/Model.php');

$idClient = $_POST['Id_client'];

supprimerAccept($idClient);
	
Header("Location: ClientListerInit.php" );
?>
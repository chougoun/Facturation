<?php
require ('../ProduitModel/Model.php');

$proId = $_POST['id'];

supprimerAccept($proId);

Header("Location: ../controller/ProduitListerInit.php" );
?>
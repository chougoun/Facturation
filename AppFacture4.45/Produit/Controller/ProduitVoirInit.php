<?php
require ('../ProduitModel/Model.php');
$proId = $_GET['id'];

voirInit($proId);

Header("Location: ../vue/ProduitVoir.php" );
?>
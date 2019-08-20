<?php
require ('../ProduitModel/Model.php');

$proId = $_GET['id'];

modifierInit($proId);

Header("Location: ../vue/ProduitModifier.php" );
?>
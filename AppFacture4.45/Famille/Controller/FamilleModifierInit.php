<?php
require ('../FamilleModel/Model.php');

$famIdFamille = $_GET['fam_id_famille'];

modifierInit($famIdFamille);

Header("Location: ../vue/FamilleModifier.php" );
?>
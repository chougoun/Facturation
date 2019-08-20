<?php
require ('../SousFamilleModel/Model.php');

$sfaIdSousFamille = $_GET['sfa_id_sous_famille'];

modifierInit($sfaIdSousFamille );

Header("Location: ../vue/SousFamilleModifier.php" );
?>
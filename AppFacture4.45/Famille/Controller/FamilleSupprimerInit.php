<?php

require ('../FamilleModel/Model.php');

$famIdFamille = $_GET['fam_id_famille'];

supprimerInit($famIdFamille,$famNomFamille);

Header("Location: ../vue/FamilleSupprimer.php" );
?>
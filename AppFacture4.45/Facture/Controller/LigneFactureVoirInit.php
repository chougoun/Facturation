<?php

require('../FactureModel/Model.php');

$lfaIdLigneFacture = $_GET['lfa_id_ligne_facture'];
findByIdLigneFacture($lfaIdLigneFacture);

Header("Location: ../Vue/LigneFactureVoir.php" );
?>
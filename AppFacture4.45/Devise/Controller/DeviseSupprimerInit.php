<?php
require ('../DeviseModel/Model.php');
$devId = $_GET['id'];

supprimerInit($devId);

Header("Location: ../vue/DeviseSupprimer.php" );
?>
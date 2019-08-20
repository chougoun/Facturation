<?php
require ('../DeviseModel/Model.php');
$devId = $_GET['id'];

voir($devId); 

Header("Location: ../vue/DeviseVoir.php" );
?>
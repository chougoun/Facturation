<?php
require ('../DeviseModel/Model.php');

$devId = $_GET['id'];

modifierInit($devId);

Header("Location: ../vue/DeviseModifier.php" );
?>
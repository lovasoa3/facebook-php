<?php
session_start();

unset( $_SESSION['idAmiChate']);
header('location: ../discutionList.php');
?>
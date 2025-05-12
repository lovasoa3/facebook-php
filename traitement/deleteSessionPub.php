<?php
session_start();
unset($_SESSION['idPubSelect']);
header('location:../publication.php');
?>

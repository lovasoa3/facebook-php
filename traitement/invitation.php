<?php
include('connectionDB.php');
include('function.php');
session_start();
include('sessionUser.php');
$db=connectionDB();
//envoi demande
if(isset($_POST['idAmi']) && $_POST['idAmi']!=null){
    $idAmi=$_POST['idAmi'];
    insertAmi($idActif,$idAmi,$db);
    header('location:../suggestion.php');
}

//delete demande
if(isset($_POST['idAmiAnnule']) && $_POST['idAmiAnnule']!=null){
    $idAmi=$_POST['idAmiAnnule'];
    deleteDemande($idActif,$idAmi,$db);
    header('location:../publication.php');
}else{
    echo'erreur de suppression';
}
?>
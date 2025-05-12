<?php
 include('connectionDB.php');
 include('function.php');
 $db=connectionDB();
 session_start();
 include('sessionUser.php');

if(isset($_POST['idOnePub']) && $_POST['nomPostPub']){
  $_SESSION['idPubSelect']=$_POST['idOnePub'];
  $_SESSION['nomPub']=$_POST['nomPostPub'];
  header('location:../commentaire.php');  
  
}
else if(isset($_POST['textCommentaire'])&& $_POST['textCommentaire']!=null){
  $text=$_POST['textCommentaire'];
  $idPub=$_SESSION['idPubSelect'];
  insertCommentaire($text,$idActif,$idPub,$db);
  header('location:../commentaire.php');
}
 
?>
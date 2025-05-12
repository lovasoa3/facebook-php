<?php
include("traitement/connectionDB.php");
include("traitement/function.php");
if(isset($_POST["emaili"]) && !empty($_POST["emaili"]) &&
   isset($_POST["mdpi"]) && !empty($_POST["mdpi"])){
   $emaili=$_POST["emaili"];
   $mdpi=$_POST["mdpi"];
   $db=connectionDB();
    if($donnee=selectMenbre($mdpi,$emaili,$db)){
      if($donnee!=null){
            session_start();
            $_SESSION['membre'][$donnee['idMenbre']] = [
                'idMenbre' => $donnee['idMenbre'],
                'nom' => $donnee['nom'],
                'email' => $donnee['email']
            ];
            
            header("location:publication.php");
        }  
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>login</title>
</head>
<body>
    <form action="login.php" method="post" class="form">
        <h1>login</h1>
        <input type="email" name="emaili" placeholder="enter your email">
        <input type="password" name="mdpi" placeholder="enter your password">
        <button type="submit" >valider</button>
        <a href="index.php">inscription</a>
    </form>
    

</body>
</html>
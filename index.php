<?php
include("traitement/connectionDB.php");
include("traitement/function.php");

   if(isset($_POST["email"]) && !empty($_POST["email"]) &&
      isset($_POST["dateNaissance"]) && !empty($_POST["dateNaissance"]) &&
      isset($_POST["nom"]) && !empty($_POST["nom"]) &&
      isset($_POST["mdp"]) && !empty($_POST["mdp"])){
         $email=$_POST["email"];
         $date=$_POST["dateNaissance"];
         $nom=$_POST["nom"];
         $mdp=$_POST["mdp"];
      if($db=connectionDB()){
         insertMenbre($email,$date,$nom,$mdp,$db);
         header("location:../login.php");
      }
   }
   
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <form action="index.php" method="post" class="form1">
        <div class="item">
            <h1>inscription</h1>
        </div>
        <div class="item">
            <label for="nom">Nom</label>
            <input type="text" name="nom">
       </div>
       <div class="item">
            <label for="date">date de naissance</label>
            <input type="date" name="dateNaissance">
       </div>
       <div class="item">
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        
        <div class="item">
            <label for="mpd">Mot de passe</label>
            <input type="password" name="mdp">
        </div>
        <div class="item">
            <button type="submit">valider</button>
        </div>
        <a href="login.php">login</a>
    </form>
</body>
</html>
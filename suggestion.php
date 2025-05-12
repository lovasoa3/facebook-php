<?php
include('traitement\connectionDB.php');
include('traitement\function.php');
session_start();
include('traitement\sessionUser.php');
$db=connectionDB();
if($db){
    $select=selectAllUser($idActif,$db);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pub.css">
    <link rel="stylesheet" href="css/suggestion.css">
    <title>suggestion</title>
</head>
<body>
    <?php
            include('navbar.php');
    ?>
    <div class="listSuggestion">
       <?php
        
            while($donnee=mysqli_fetch_assoc($select)){
                $id=$donnee['idMenbre'];
                $nbrPub=countPub($id,$db);

                echo' 
                    <form action="traitement/invitation.php" method="post" class="ItemSug1">
                        <div class="ph">
                            <img src="photo\profil.png" alt="">
                        </div>
                        <div>
                            <h3>'.$donnee['nom'].'</h3>
                            <p>'.$donnee['email'].'</p>
                            <input type="hidden" name="idAmi" value="'.$donnee['idMenbre'].'">
                            <button type="submit" class="ajout">ajouter</button>
                        </div>

                    </form>';
            }
       ?>
    </div>

    
</body>
</html>
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
    <link rel="stylesheet" href="css/amis.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>suggestion</title>
</head>
<body>
    <?php
            include('navbar.php');
    ?>
    <h1>suggestion</h1>
    <div class="container">
        <div class="row row-cols-4">
            <?php
            while($donne3=mysqli_fetch_assoc($select)){
                $id=$donne3['idMenbre'];
                $nbrPub=countPub($id,$db);
                echo' 
                    <div class="col">
                    <div class="card" id="cardStyle" style="width: 15rem;">
                            <div class="imgContainer">
                                <img src="'.$donne3["url"].'" class="card-img-top" alt="...">
                            </div>  
                            <div class="card-body">
                                <form action="traitement/invitation.php" method="post">
                                    <h5 class="card-title">'.$donne3['nom'].'</h5>
                                    <p>'.$donne3['email'].'</p>
                                    <input type="hidden" name="idAmiAccepter" value="'.$donne3["idMenbre"].'">
                                    <button type="submit" class="btn btn-primary" style="width:100%;">ajouter</button><br>
                                   
                                </form> 
                            </div>
                        </div>';
            }
            ?>  
        </div>
    </div>
</body>
</html>

                     
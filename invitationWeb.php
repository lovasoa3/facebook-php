<?php
 session_start();
 include('traitement\sessionUser.php');
 include('traitement\connectionDB.php');
 include('traitement\function.php');
 $db=connectionDB();
 $allAmis=invitation($idActif,$db);
 if(isset($_POST['idAmiAccepter']) && $_POST['idAmiAccepter']!=null){
    $idAmis=$_POST['idAmiAccepter'];
    accepterInvitation($idAmis,$idActif,$db);
    ajouteUnDiscution($idActif,$idAmis,$db);
    $allAmis;
    header("location:invitationWeb.php");

 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pub.css">
     <link rel="stylesheet" href="css/discution.css">
    <link rel="stylesheet" href="css/amis.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>invitation</title>
</head>
<body>
    <?php
      include('navbar.php')
    ?>
    <h1 class="">invitation</h1>
    <div class="allAmis">
        <?php
              if($allAmis!=null){
                while($donne3=mysqli_fetch_assoc($allAmis)){
                    echo' 
                        <div class="card" id="cardStyle" style="width: 15rem;">
                            <div class="imgContainer">
                                <img src="'.$donne3["url"].'" class="card-img-top" alt="...">
                            </div>  
                            <div class="card-body">
                                <form action="invitationWeb.php" method="post">
                                    <h5 class="card-title">'.$donne3['nom'].'</h5>
                                    <input type="hidden" name="idAmiAccepter" value="'.$donne3["idMenbre"].'">
                                    <button type="submit" class="btn btn-primary" style="width:100%;">accepter</button><br>
                                    <button type="submit" class="btn btn-danger" style="width:100%; margin-top:1vh;">suprimer</button> 
                                </form> 
                            </div>
                        </div>
                        ';
                            
                }
            }else{
                echo '<p>aucune invitation</p>';
            }
     
        ?>
    </div> 
</body>
</html>


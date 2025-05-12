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
    <link rel="stylesheet" href="css/amis.css">
    <link rel="stylesheet" href="css/discution.css">
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
                        <form action="invitationWeb.php" method="post" class="ItemSug1">
                            <div class="imgAmi">
                                <img src="photo\profil.png" alt="">
                            </div>
                            <div class="demand">
                                <h3>'.$donne3['nom'].'</h3>
                                <p>'.$donne3['email'].'</p>
                                <input type="hidden" name="idAmiAccepter" value="'.$donne3["idMenbre"].'">
                                </div>
                            <div>
                                <button type="submit" class="annule">accepter</button>  
                            </div>
                        </form>';
                            
                }
            }else{
                echo '<p>aucune invitation</p>';
            }
     
        ?>
    </div> 
</body>
</html>
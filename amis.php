<?php
 session_start();
 include('traitement\sessionUser.php');
 include('traitement\connectionDB.php');
 include('traitement\function.php');
 $db=connectionDB();
 $allAmis=selectMonAmis($idActif,$db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pub.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/amis.css">
    <title>Document</title>
</head>
<body>
    <?php
      include('navbar.php')
    ?>
    <div class="allAmis">
        <?php
              if($allAmis!=null){
                while($donne3=mysqli_fetch_assoc($allAmis)){
                    echo '
                <form action="profil.php" method="post" class="ItemSug1" style="border:1px solid red;width:50Vh;">
                <button type="submit" class="apropos"  style="border:none;margin-top:1vh;">    
                <div class="itemAbout">
                        <div class="containerImg">
                            <img src="'. $donne3['url'] . '" alt="">
                        </div>
                        <div class="nom_date">
                            <h3 class="nom">' . $donne3['nom'] . '</h3>
                        </div>
                    </div>
                    <div class="btnChoix">
                        <input type="hidden" name="idAmi" value="' . $donne3['idMenbre'] . '">
                    </div>
                    </button>
                </form>';
                            
                }
            }else{
                echo '<p>aucune amis</p>';
            }
     
        ?>
    </div>
    
    
</body>
</html>
<!--
$sql=sprintf("SELECT * FROM menbre WHERE idMenbre !='%d' and  ORDER BY RAND() LImit 6",$idMenbre);
$sql=sprintf("SELECT  monId , menbre.idMenbre ,menbre.nom, dateInvitation FROM `amis` join menbre on menbre.idMenbre=amis.idMenbre
WHERE monId='%d' AND dateAcceptation is NULL",$idMenbre);
        -->
<?php
session_start();
    include('traitement\sessionUser.php');
    include("traitement/connectionDB.php");
    include('traitement\function.php');
    $db=connectionDB();
    $allDiscution=toutLesDiscution($idActif,$db);
    if(isset($_POST["idAmiChate"]) && $_POST["idAmiChate"]!=null && isset($_POST["nomAmiChate"]) && $_POST["nomAmiChate"]!=null){
        $_SESSION['idAmiChate']=$_POST["idAmiChate"];
        $_SESSION['nomAmiChate']=$_POST["nomAmiChate"];
        header("location:../message.php");
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
    <link rel="stylesheet" href="css/about.css">
    <title>Document</title>
</head>
<body>
    <?php
    include('navbar.php');
    ?>
         <section class="">
    <?php
        while ($donne3 = mysqli_fetch_assoc($allDiscution)) {
            echo '
                <form action="discutionList.php" method="post" class="ItemSug1">
                    <div class="itemAbout">
                        <div class="containerImg">
                            <img src="photo/profil.png" alt="">
                        </div>
                        <div class="nom_date">
                            <button type="submit" class="annule"><h3 class="nom">' . $donne3['nom'] . '</h3></button>
                        </div>
                    </div>
                    <div class="btnChoix">
                        <input type="hidden" name="idAmiChate" value="' . $donne3['idMenbre'] . '">
                        <input type="hidden" name="nomAmiChate" value="' . $donne3['nom'] . '">
                    </div>
                </form>';
        }
    ?>
</section>
    
    
</body>
</html>
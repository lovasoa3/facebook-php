<?php
include("traitement/connectionDB.php");
include("traitement/function.php");
$db = connectionDB();
session_start();
if (isset($_SESSION['membre']) && !empty($_SESSION['membre'])) {
    $idMenbreActuel = key($_SESSION['membre']);
    if (isset($_SESSION['membre'][$idMenbreActuel])) {
        $membre = $_SESSION['membre'][$idMenbreActuel];
        $email = $membre['email'];
        $idActif = $membre['idMenbre'];
        $nom =$membre['nom'];
        if (isset($_POST["textPub"]) && !empty($_POST["textPub"])) {
            $text = $_POST['textPub'];
            insertPub($text, $idActif, $db);
            header("location:publication.php");
        }
    }
} else {
    echo "Erreur : Aucun membre connecté. Veuillez vous connecter.";
}
$selectDemande=selectMaDemande($idActif,$db)




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pub.css">
    <link rel="stylesheet" href="css/demande.css">
    <link rel="stylesheet" href="css/about.css">

    <title>POP-UP</title>
</head>
<body>
    <?php
        include('navbar.php')
    ?>
<div class="cont">
   <section class="formPub">
        <div class="container">
            
            <h3 class="hPub">publier votre pub </h3>
        </div>
        <div class="container">
            <form action="publication.php" method="post" class="containerForm">
                <h1></h1>
                <textarea name="textPub" class="text" placeholder="publier"></textarea>
                <button type="submit" id="btn">publier</button>
            </form>
        </div>
    </section>
    <section class="listPub"> 
        <h1> toutes les publications</h1>
        <?php
            $db=connectionDB();
            $SELECT=selectAllPub($db);
            while($donne=mysqli_fetch_assoc($SELECT)){
                echo' 
                    <div class="itemPub">
                        <div class="itemAbout">
                            <div class="containerImg">
                                <img src="'.$donne["url"].'" alt="">
                            </div>
                            <div class="nom_date">
                                <p class="nom">'.$donne["nom"].'</p>
                                <p class="date">'.$donne["datePublication"].'</p>
                            </div>
                        </div>
                        <div>
                            <pre class="pText">'.$donne["description"].'</pre>
                            <form action="traitement/insertCommentaire.php" method="post">
                                <input type="hidden" name="idOnePub" value="'.$donne["idpublication"].'">
                                <input type="hidden" name="nomPostPub" value="'.$donne["nom"].'">
                                <button type="submit" id="voirPlus">voir plus</button>
                            </form>
                        </div>
                    </div>';
            }       

        ?>
    </section>

        <!--list -->
        <section class="suggestion">
    <?php
        while ($donne3 = mysqli_fetch_assoc($selectDemande)) {
            echo '
                <form action="traitement/invitation.php" method="post" class="ItemSug1">
                    <div class="itemAbout">
                        <div class="containerImg">
                            <img src="photo/profil.png" alt="">
                        </div>
                        <div class="nom_date">
                            <h3 class="nom">' . $donne3['nom'] . '</h3>
                            <p class="date">' . $donne3['dateInvitation'] . '</p>
                        </div>
                    </div>
                    <div class="btnChoix">
                        <input type="hidden" name="idAmiAnnule" value="' . $donne3['idMenbre'] . '">
                        <button type="submit" class="annule">Annuler</button>
                    </div>
                </form>';
        }
    ?>
</section>

</div>
</body>
</html>


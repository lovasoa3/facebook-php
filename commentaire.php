<?php
 include('traitement\connectionDB.php');
 include('traitement\function.php');
 $db=connectionDB();
session_start();
if($_SESSION['idPubSelect']!=null &&$_SESSION['nomPub']!=null){
    $idPub=$_SESSION['idPubSelect'];
    $nom=$_SESSION['nomPub'];
    $getOnePub=selectOnePub($idPub,$db);
    $getComment=selectAllCommentaire($idPub,$db);  
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pub.css">
    <link rel="stylesheet" href="css/commentaire.css">
    <title>commentaire</title>
</head>
<body>
    <section>
        <div class="containerComment">

            <div class="h">
                <a href="/traitement/deleteSessionPub.php">retour</a>
                <h1>publication de <?php echo $nom?></h1>
            </div>
            <div class="comment">
                <?php
                   if ($donne1 = mysqli_fetch_assoc($getOnePub)) {
                    echo '
                        <div class="itemPub">
                            <p class="nom">'.$donne1["nom"].'</p>
                            <p class="date">'.$donne1["datePublication"].'</p>
                            <p class="pText">'.$donne1["description"].'</p>
                        </div>';
                } else {
                    echo '<p>Aucune publication trouvée.</p>';
                }                       
                ?>
                <?php
                   while ($donne2 = mysqli_fetch_assoc($getComment)) {
                    echo '
                        <div class="itemPub1">
                            <p class="nom">'.$donne2["nom"].'</p>
                            <p class="pText1">'.$donne2["commenter"].'</p>
                             <p class="date">'.$donne2["dateCommentaire"].'</p>
                        </div>';
                }
                if (mysqli_num_rows($getComment) == 0) {
                    echo '<p class="centre">Aucun commentaire trouvé.</p>';
                }
                 
                ?>
            </div>
           
            <div>
                <form action="traitement/insertCommentaire.php" method="post" id="formCommentaire">
                    <textarea name="textCommentaire" class="commentaire" ></textarea>
                    <button type="submit" id="sendcommentaire">commenter</button> 
                </form>
            </div>
        </div>
    </section>
</body>
</html>

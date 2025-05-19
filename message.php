<?php
include('traitement\connectionDB.php');
include('traitement\function.php');
session_start();
include('traitement\sessionUser.php');
include('traitement\sessionDeMessage.php');
$room=$idActif.$idAmi;
$db=connectionDB();
$conversation=messageDunUser($idActif,$idAmi,$db);
if(isset($_POST['chatSend'])  && isset($_POST['idDestination'])
   && isset($_POST['room']) && isset($_POST['idActifSend'])){
    $sendId=$_POST['idActifSend'];
    $reseveId=$_POST['idDestination'];
    $sms=$_POST['chatSend'];
    $room3=$_POST['room'];
    var_dump($sendId);
    sendMessage($sendId,$reseveId,$sms,$db);
    $conversation;
    header("location:message.php");
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/discution.css">
     <link rel="stylesheet" href="css/pub.css">
    <link rel="stylesheet" href="css/demande.css">
    <link rel="stylesheet" href="css/about.css">
    <title>chat</title>
</head>
<body>
    <a href="traitement\deleteSessionUser.php" style="position: fixed;margin-left:1vh;">retour</a>
    <form class="containerChat" action="message.php" method="post">
        <div class="nomAmi">
             <div class="imgAmi">
                <?php
                    echo'<img src="'.$url.'" alt="">';
                ?>
                
             </div>
            <h3><?php echo $nomAmi?></h3>
        </div>
        <div class="champChat">
            <?php
            while($donnee=mysqli_fetch_assoc($conversation)){
                if($donnee['idActif']==$idActif){
                    echo' <div class="myChat">
                            <pre class="amiChat">'.$donnee['sms'].'</pre>
                            </div>';
                }else{
                    echo' <div class="nomAmiChat">
                            <div class="imgAmi">
                                <img src="'.$url.'" alt="">
                            </div>
                            <pre class="monChat">'.$donnee['sms'].'</pre>
                        </div>';
                }
            }
            ?>
        </div>
        <div class="inputAndSend">
            <textarea name="chatSend" placeholder="message" class="inputMessage"></textarea>
            <input type="hidden" name="idDestination" <?php echo'value="'.$idAmi.'"'?>>
            <input type="hidden" name="idActifSend" <?php echo'value="'.$idActif.'"'?>>
            <input type="hidden" name="room" <?php echo'value="'.$room.'"'?>>
            <button type="submit" class="send"><img src="photo/send-removebg-preview.png" alt=""></button>
        </div>
    </form>
</body>
</html>
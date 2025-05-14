<?php
include("traitement/connectionDB.php");
include("traitement/function.php");
session_start();
include('traitement\sessionUser.php');
$db = connectionDB();
if(isset($_POST['idAmi']) && $_POST['idAmi']!=null){
    $id=$_POST['idAmi'];
    $donne3=mysqli_fetch_assoc(selectUser($id,$db));
    $SELECT=pubUser($id,$db);
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/pub.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/pub.css">
    <link rel="stylesheet" href="css/demande.css">
    <link rel="stylesheet" href="css/about.css">
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>profil</title>
</head>
<body>
    <?php
    include('navbar.php');
    ?>
    <div class="container">
        <section class="h-100 gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center">
      <div class="col col-lg-9 col-xl-8">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                <?php echo'<img src="'.$donne3["url"].'"
                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 150px; z-index: 1">'?>
              <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-dark text-body" data-mdb-ripple-color="dark" style="z-index: 1;">
                Edit profile
              </button>
            </div>
            <div class="ms-3" style="margin-top: 130px;">
              <?php echo '<h5>'.$donne3['nom'].'</h5>'?>
            </div>
          </div>
          <div class="p-4 text-black bg-body-tertiary">
            <div class="d-flex justify-content-end text-center py-1 text-body">
            </div>
          </div>
          <div class="card-body p-4 text-black">
            <div class="mb-5  text-body">
              <p class="lead fw-normal mb-1">A propos</p>
              <div class="p-4 bg-body-tertiary">
                <?php
                    echo'
                    <p class="font-italic mb-1">email : '.$donne3['email'].'</p>
                    <p class="font-italic mb-1">date de naissance : '.$donne3['dateNaissonce'].'</p>

                '
                ?>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4 text-body">
              <p class="lead fw-normal mb-0">publication</p>
            </div>

            <!-- les pu les user-->
            <div class="row g-2 d-flex justify-content-center">
                 <?php
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </div>
    
</body>
</html>

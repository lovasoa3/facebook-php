<div class="navBar">
       <div class="connexion">
          <form action="profil.php" method="post" >
               <button type="submit" style="border: none;">
                    <h1 class="user">user:<a href="monProfil.php"><?php echo $nom?></a></h1>
               </button>
          </form>
          
            
       </div>
       <div class="navItem">
            <a href="publication.php"><img src="photo/home-blue.png" alt=""></a>
            <a href="amis.php"><img src="photo/amis.png" alt=""></a>
            <a href="invitationWeb.php"><img src="photo/ajouter-un-ami.png" alt=""></a>
            <a href="discutionList.php" class="mess"><img src="photo/mess-removebg-preview.png" alt=""></a>
            <a href="suggestion.php"><img src="photo/membres.png" alt=""></a>
       </div>
       <div class="deconnexion">
             <a href="traitement/destroy.php">deconnexion</a>
       </div>
   </div>
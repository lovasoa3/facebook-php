<?php
     if (isset($_SESSION['membre']) && !empty($_SESSION['membre'])) {
         $idMenbreActuel = key($_SESSION['membre']);
         if (isset($_SESSION['membre'][$idMenbreActuel])) {
             $membre = $_SESSION['membre'][$idMenbreActuel];
             $email = $membre['email'];
             $idActif = $membre['idMenbre'];
             $nom =$membre['nom'];
             $url=$membre['url'];
         }
     }
?>
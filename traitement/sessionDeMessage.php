<?php
    if(isset($_SESSION['idAmiChate']) && !empty($_SESSION['idAmiChate']) 
    && isset($_SESSION['nomAmiChate']) && !empty($_SESSION['nomAmiChate'])){
        $nomAmi=$_SESSION['nomAmiChate'];
        $idAmi=$_SESSION['idAmiChate'];
    }
?>
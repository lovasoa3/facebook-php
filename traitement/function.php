<?php
 function insertMenbre($email,$date,$nom,$mdp,$db){
    $sql=sprintf("INSERT INTO menbre(email, dateNaissonce, nom, mdp) VALUES ('%s','%s','%s','%s')",$email,$date,$nom,$mdp);
    if($statment=mysqli_query($db,$sql)){ 
    }else{
       echo 'insertion a echouer';
       echo'<a href="">click ici pour revenir</a>';
       
    }
  }
  //select un user
  function selectUser($idMenbre,$db){
     $sql=sprintf("SELECT * FROM menbre WHERE idMenbre=%d",$idMenbre);
     return $statement=mysqli_query($db,$sql);
  }
  //select tout les pub d un user
  function pubUser($idMenbre,$db){
       $sql1=sprintf("SELECT idpublication, datePublication, description, menbre.nom ,menbre.idMenbre,menbre.url
        FROM publication
        join menbre
        on publication.idMenbre=menbre.idMenbre WHERE menbre.idMenbre=%d
        order by datePublication desc",$idMenbre);
        return $SELECT=mysqli_query($db,$sql1);
  }
  

  //select suggestion
  function selectAllUser($idMenbre,$db){
      $sql=sprintf("SELECT * FROM menbre WHERE idMenbre!=%d AND idMenbre 
          not in (SELECT monId FROM amis WHERE amis.idMenbre=%d
          UNION
          SELECt amis.idMenbre FROM amis WHERE monId=%d) ",$idMenbre,$idMenbre,$idMenbre);
     return $statement=mysqli_query($db,$sql);
  }

  function selectMenbre($mdpi,$emaili,$db){
    $sql=sprintf("SELECT * FROM menbre WHERE mdp='%s' AND email='%s'",$mdpi,$emaili);
    $statement=mysqli_query($db,$sql);
    return   $donnee=mysqli_fetch_assoc($statement);
  }

  // maka ny pub rehetr
  function selectAllPub($db){
    $sql1=sprintf("SELECT *
        FROM publication
        join menbre
        on publication.idMenbre=menbre.idMenbre
        order by datePublication desc");
        return $SELECT=mysqli_query($db,$sql1);
  }
  function insertPub($text,$idMenbre,$db){
        $sql=sprintf("INSERT INTO publication(description,idMenbre) VALUE('%s',%d)",$text,$idMenbre);
        $insertPub=mysqli_query($db,$sql);
  }
  function selectOnePub($idPub,$db){
        $sql=sprintf("SELECT idpublication, datePublication, description, menbre.nom ,menbre.idMenbre
                        FROM publication
                        join menbre
                        on publication.idMenbre=menbre.idMenbre
                        where idpublication='%d'",$idPub);
        return $selectOne=mysqli_query($db,$sql);
  }
  function insertCommentaire($text,$idMenbre,$idPub,$db){
        $sql=sprintf("INSERT INTO commentaire(commenter,idMenbre,idPub) VALUES ('%s','%d','%d')",$text,$idMenbre,$idPub);
        $insertComentaire=mysqli_query($db,$sql);
  }
  function selectAllCommentaire($idPub,$db){
        $sql1=sprintf("SELECT `idCommentaire`, `commenter`, `dateCommentaire`,menbre.nom , menbre.idMenbre
                    FROM commentaire
                    join menbre
                    on commentaire.idMenbre=menbre.idMenbre
                    where idPub='%d'
                    order by dateCommentaire desc",$idPub);
        return $selectAllCommentaire=mysqli_query($db,$sql1);
  }
  function insertAmi($monId,$idAmi,$db){
      $sql=sprintf("INSERT INTO amis(monId, idMenbre) VALUES ('%d','%d')",$monId,$idAmi);
      $insert=mysqli_query($db,$sql);
  }
  function selectMaDemande($idMenbre,$db){
      $sql=sprintf("SELECT  monId , menbre.idMenbre ,menbre.nom ,menbre.url, dateInvitation FROM `amis` join menbre on menbre.idMenbre=amis.idMenbre
                  WHERE monId='%d' AND dateAcceptation is NULL",$idMenbre);
      return $statement=mysqli_query($db,$sql);
  }
  //annuler le demande envoyer
  function deleteDemande($monId,$idAmi,$db){
            $sql=sprintf("DELETE FROM `amis` WHERE idMenbre=%d And monId=%d",$idAmi,$monId);
            $statement=mysqli_query($db,$sql);
  }
  //accepter l invitation
  function accepterInvitation($monId,$idAmi,$db){
    $sql=sprintf("UPDATE amis SET dateAcceptation=now() WHERE monId=%d AND idMenbre=%d",$monId,$idAmi);
    $statement=mysqli_query($db,$sql);
  }

  //demande envoyer par d'autre user
  function invitation($monId,$db){
    $sql=sprintf("SELECT  *
                FROM `menbre`
                WHERE idMenbre
                in(SELECT  monId FROM amis 
                WHERE amis.idMenbre=%d AND dateAcceptation is  NULL)",$monId);
      return $statement=mysqli_query($db,$sql);
}
//maka ny namana rehetra
  function selectMonAmis($monId,$db){
      $sql=sprintf("SELECT * FROM `menbre` WHERE idMenbre IN(SELECT  menbre.idMenbre 
                    FROM `amis` join menbre on menbre.idMenbre=amis.idMenbre
                    WHERE monId=%d AND dateAcceptation is not NULL
                    union 
                    SELECT  monId 
                    FROM `amis` join menbre on menbre.idMenbre=amis.idMenbre
                    WHERE menbre.idMenbre=%d AND dateAcceptation is not NULL)",$monId,$monId);
        return $statement=mysqli_query($db,$sql);
  }
  //count les pub d'un user
  function countPub($idAmi, $db) {
    $sql = sprintf("SELECT COUNT(idMenbre) AS total FROM publication WHERE idMenbre = %d", $idAmi);
    $result = mysqli_query($db, $sql);
    return $result;
    }

//demande envoyer par une autre user
  function selectSaDemande($idMenbre,$db){
      $sql=sprintf("SELECT  monId , menbre.idMenbre ,menbre.nom, menbre.url, dateInvitation FROM `amis` join menbre on menbre.idMenbre=amis.idMenbre
              WHERE idMenbre='%d' AND dateAcceptation is NULL",$idMenbre);
      return $statement=mysqli_query($db,$sql);
  }

  // list  discution a qui j'ai chater
  function toutLesDiscution($monId,$db){
      $sql=sprintf("SELECT * FROM `menbre` WHERE idMenbre in 
                    (SELECT  `amiId` FROM `discution` WHERE monId=%d
                      UNION
                      SELECT  `monId` FROM `discution` WHERE amiId=%d)",$monId,$monId);
      return $statement=mysqli_query($db,$sql);
  }
  //ajouter 1 user a la list de discution
  function ajouteUnDiscution($monId,$idAmi,$db){
    $sql=sprintf("INSERT INTO discution (`monId`, `amiId`, `dateDiscution`)
      VALUES (%d,%d,now())",$monId,$idAmi);
      $statement=mysqli_query($db,$sql);
  }

  //mise a jours le dernier discution
  function updateDateDiscution($monId,$idAmi,$db){
      $sql=sprintf("UPDATE `discution` SET dateDiscution=mow() WHERE idMenbre=%d And monId=%d",$idAmi,$monId);
      $statement=mysqli_query($db,$sql);
  }

  //select le message d un user a qui j ai chater
  function messageDunUser($monId,$idAmi,$db){
    $room=$monId.$idAmi;
    $room1=$idAmi.$monId;
    $sql=sprintf("SELECT * FROM message WHERE room='%s' or room='%s' order by dateSend asc",$room,$room1);
    $statement=mysqli_query($db,$sql);
    return $statement;
  }
  //envoyer un message
  function sendMessage($monId,$idAmi,$sms,$db){
    $room=$monId.$idAmi;
    $sql=sprintf("INSERT INTO message (idActif, amiId, dateSend, sms, room) 
    VALUES (%d,%d,now(),'%s','%s')",$monId,$idAmi,$sms,$room);
    $statement=mysqli_query($db,$sql);
  }

  //insert nouveau image
  function insertIMG($idMenbre,$url,$db){
    $sql=sprintf("INSERT INTO `image`(`uriImage`, `dateIssertion`, `idUser`) VALUES ('%s',now(),%d)",$url,$idMenbre);
    $statement=mysqli_query($db,$sql);
  }

  //update l image de user
  function updateIMG($idMenbre,$url,$db){
     $sql=sprintf("UPDATE `menbre` SET url='%s' WHERE idMenbre=%d",$url,$idMenbre);
     $statement=mysqli_query($db,$sql);
  }
//upload sary

  
?>
create table message(
    idMessage int AUTO_INCREMENT primary key,
    monId int not null,
    amiId int not null,
    dateSend DATETIME DEFAULT CURRENT_TIMESTAMP
    sms text not null,
    FOREIGN KEY (monId) REFERENCES amis(monId),
    FOREIGN key (amiId) REFERENCES amis(idMenbre)
)

SELECT  monId , menbre.idMenbre ,menbre.email ,menbre.nom, dateInvitation FROM `amis` join menbre on menbre.idMenbre=amis.idMenbre
WHERE monId=%d AND dateAcceptation is not NULL
union 
SELECT  monId , menbre.idMenbre ,menbre.email ,menbre.nom, dateInvitation FROM `amis` join menbre on menbre.idMenbre=amis.idMenbre
WHERE menbre.idMenbre=%d AND dateAcceptation is not NULL

      
  
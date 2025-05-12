create table amis(
    idDemande int AUTO_INCREMENT primary key,
    monId int not NULL;
    idMenbre int not NULL;
    dateInvitation DATETIME DEFAULT CURRENT_TIMESTAMP;
    dateAcceptation DATETIME DEFAULT NULL;
)
INSERT INTO amis(monId, amiId) VALUES ('%d','%d');

SELECT idDemande , monId ,,email.menbre ,nom.menbre, ,dateInvitation, FROM `amis` WHERE 1


SELECT  monId , menbre.idMenbre ,menbre.nom,dateInvitation FROM `amis` join menbre on menbre.idMenbre=amis.idMenbre
WHERE monId=5 AND dateAcceptation is NULL;
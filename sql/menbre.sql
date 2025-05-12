create table menbre(
    idMenbre int primary key AUTO_INCREMENT,
    email VARCHAR(200) UNIQUE NOT NULL,
    dateNaissonce date,
    nom VARCHAR(200);
    mdp VARCHAR(50)
)

create table publication(
    idpublication int  AUTO_INCREMENT primary key,
    datePublication DATETIME DEFAULT CURRENT_TIMESTAMP,
    description text NOT NULL
)
Alter Table publication ADD COLUMN idMenbre int not NULL;



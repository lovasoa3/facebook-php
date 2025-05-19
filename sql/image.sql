CREATE TABLE image(
    idImage int AUTO_INCREMENT primary key,
    uriImage varchar(200)
    dateIssertion DATETIME default CURRENT_TIMESTAMP
    idUser int ,
    FOREIGN KEY (idUser) REFERENCES menbre(idMenbre)
)
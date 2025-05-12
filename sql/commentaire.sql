create table commentaire(
    idCommentaire int AUTO_INCREMENT primary key,
    commenter text not NULL,
    dateCommentaire DATETIME DEFAULT CURRENT_TIMESTAMP,
    idMenbre int not NULL,
    idPub int not NULL
)
INSERT INTO commentaire(commenter,dateCommentaire,idMenbre) VALUES ()
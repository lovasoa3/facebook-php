create table discution(
     idDiscution int AUTO_INCREMENT primary key,
     monId int not null,
     amiId int not null,
     dateDiscution DATETIME DEFAULT CURRENT_TIMESTAMP,
     FOREIGN KEY (monId) REFERENCES amis(monId),
     FOREIGN key (amiId) REFERENCES amis(idMenbre),
)
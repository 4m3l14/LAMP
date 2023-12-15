CREATE DATABASE IF NOT EXISTS videoteca;
USE videoteca;

create TABLE attore
(
    ID_attore int not null AUTO_INCREMENT PRIMARY KEY,
    nome varchar(64) not null,
    cognome varchar(64) not null,
    nascita date
);

CREATE TABLE film(
    ID_film int not null AUTO_INCREMENT PRIMARY KEY,
    titolo varchar(64) not null,
    id_attore int
    id_genere int,
    anno_pubblicazione int
);

CREATE TABLE contratto(
ID_attore int NOT null ,
    ID_film int NOT null,
    FOREIGN KEY (ID_attore)REFERENCES attore(ID_attore),
    FOREIGN KEY (ID_film)REFERENCES film(ID_film)
);


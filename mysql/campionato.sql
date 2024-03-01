-- Creazione del database
CREATE DATABASE IF NOT EXISTS Campionato;
USE Campionato;

-- Creazione della tabella "Squadre"
create TABLE squadre(
    nome_squadra varchar(64) not null,
    ID_squadra int not null AUTO_INCREMENT PRIMARY KEY
);

-- Creazione della tabella "Calciatori"
create TABLE calciatori(
    cognome varchar(64),
    ruolo varchar (64),
    stipendio int,
    ID_calciatore int not null AUTO_INCREMENT PRIMARY KEY,
    ID_capitano int,
    nascita date,
    FK_squadre int,
    FOREIGN KEY (FK_squadre) REFERENCES squadre (ID_squadra)
);



-- Creazione della tabella "Valutazioni"
create TABLE valutazioni(
    voto int (64),
    ID_valutazione int not null AUTO_INCREMENT PRIMARY KEY,
    FK_calciatori int,
    FOREIGN KEY (FK_calciatori) REFERENCES calciatori (ID_calciatore)
);

SHOW TABLES;
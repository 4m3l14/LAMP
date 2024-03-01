-- Creazione del database
CREATE DATABASE IF NOT EXISTS Campionato;
USE Campionato;

-- Creazione della tabella "Calciatori"
create TABLE calciatori(
    cognome varchar(64) not null,
    ruolo int (64 )not null,
    stipendio int (64)
    ID_calciatore int not null AUTO_INCREMENT PRIMARY KEY,
    nascita date
    FOREIGN KEY (FK_calciatore)REFERENCES squadre (ID_squadre)
);

-- Creazione della tabella "Squadre"
create TABLE squadre(
    nome_squadra varchar(64) not null,
    ID_squadra int not null AUTO_INCREMENT PRIMARY KEY
);

-- Creazione della tabella "Valutazioni"
create TABLE valutazioni(
    voto int (64),
    ID_valutazione int not null AUTO_INCREMENT PRIMARY KEY,
    FOREIGN KEY (FK_valutazione)REFERENCES calciatori (ID_calciatore)
);



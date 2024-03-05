-- Creazione del database
CREATE DATABASE IF NOT EXISTS Campionato;
USE Campionato;

-- Creazione della tabella "Squadre"
create TABLE squadre(
    nome_squadra varchar(64) not null,
    ID_squadra int not null AUTO_INCREMENT PRIMARY KEY
);
SHOW TABLES;

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
SHOW TABLES;


-- Creazione della tabella "Valutazioni"
create TABLE valutazioni(
    voto int (64),
    ID_valutazione int not null AUTO_INCREMENT PRIMARY KEY,
    FK_calciatori int,
    FOREIGN KEY (FK_calciatori) REFERENCES calciatori (ID_calciatore)
);
SHOW TABLES;

/*
1)QUERY CHE MODIFICA IL CAMPO CALCIATORI 
ALTER TABLE calciatori 
CHANGE COLUMN ruolo ruolo VARCHAR(64);

2)inserire istanza nella tabella calciatori
INSERT INTO calciatori (ruolo)
VALUES ('attaccante');

3) modificare nella tabella calciatori il cognome Rossi con il cognome Bianchi
UPDATE calciatori
SET cognome='Bianchi'
WHERE cognome='Rossi';

4)cancellare nella tabella quadre l'istanza con nome squadra=Verdi
DELETE FROM squadre
WHERE nome_squadra='Verdi';

*/
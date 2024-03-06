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

5)produrre un elenco con i cognomi di tutti i calciatori aventi stipendio>10.000 oridnato su cognome
SELECT cognome 
FROM calciatori
WHERE stipendio>10.000
ORDER BY cognome;

6)visualizzare tutte le informazioni dei calciatori che ricoporono ruolo 'terzino' oi 'portiere'
SELECT * 
FROM calciatori
WHERE ruolo='terzino'or'portiere';

7)visualzzare cognome di tutti i calciatori la cui lettera 2 del cognome è 'a' e l'ultima lettera è 'o'
SELECT cognome
FROM calciatori
WHERE cognome like '_a%o';

8)produrre elenco con i cognomi dei calciatori seguiti dal nome della loro sqaudra solo per le squadre Napoli, Bologna, Verona (join con where)
SELECT cognome, nome_sqaudra


9)visualizzare qaunti calciatori sono nati prima del 2000
10)visulaizzare solo una volta in rodijne crescente tutti i voti nella tabella valutazioni
11)visualizzare il voto più alto, più basso e la media di tutti i voti della tabella valutazioni
12)per ogni calciatore visulazziare il cognome seguito dal voto massimo, dal voto minimo e dalla media dei voti e da qaunti voti ha ottenuto nelle partite che ha disputato
13)visualizzare il cognome di ogni giocatore seguito dal cognome del suo capitano
14)visualizzare i nomi delle sqaudre che non hanno calciatori
*/
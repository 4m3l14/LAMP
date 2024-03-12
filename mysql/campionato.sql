-- Creazione del database
CREATE DATABASE IF NOT EXISTS Campionato;
USE Campionato;

-- Creazione della tabella "Squadre"
CREATE TABLE squadre (
    nome_squadra VARCHAR(64) NOT NULL,
    ID_squadra INT NOT NULL AUTO_INCREMENT PRIMARY KEY
);
SHOW TABLES;

-- Inserimento di dati nella tabella "Squadre"
INSERT INTO squadre (nome_squadra, ID_squadra) VALUES
('Napoli', 7),
('Bologna', 8),
('Roma', 9),
('Verdi', 1),
('Verona', 2);

-- Creazione della tabella "Calciatori"
CREATE TABLE calciatori (
    cognome VARCHAR(64),
    ruolo VARCHAR(64),
    stipendio INT,
    ID_calciatore INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ID_capitano INT,
    nascita DATE,
    FK_squadre INT,
    FOREIGN KEY (FK_squadre) REFERENCES squadre (ID_squadra)
);
SHOW TABLES;

-- Inserimento di dati nella tabella "Calciatori"
INSERT INTO calciatori (cognome, ruolo, stipendio, ID_calciatore, ID_capitano, nascita, FK_squadre) VALUES
('Bianchi', 'terzino', 10000, 3, 1, '2005-05-10', 7),
('Zeng', 'attaccante', 15000, 18, 4, '1998-01-09', 8),
('Hu', 'attaccante', 9000, 10, 1, '2000-04-23', 1),
('Gialli', 'difensore', 20000, 8, 3, '2002-09-27', 1),
('Giolitti', 'difensore', 25000, 2, 3, '2001-11-29', 3),
('Castro', 'portiere', 12000, 5, 5, '1999-12-30', 9);

-- Creazione della tabella "Valutazioni"
CREATE TABLE valutazioni (
    voto INT,
    ID_valutazione INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FK_calciatori INT,
    FOREIGN KEY (FK_calciatori) REFERENCES calciatori (ID_calciatore)
);
SHOW TABLES;

-- Inserimento di dati nella tabella "Valutazioni"
INSERT INTO valutazioni (voto, ID_valutazione, FK_calciatori) VALUES
(8, 1, 6),
(7, 2, 3),
(6, 3, 7),
(9, 4, 2),
(5, 5, 5);


/*
1)QUERY che modifica il campo 'Calciatori'
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
SELECT cognome, nome_squadra


9)visualizzare qaunti calciatori sono nati prima del 2000
10)visulaizzare solo una volta in rodijne crescente tutti i voti nella tabella valutazioni
11)visualizzare il voto più alto, più basso e la media di tutti i voti della tabella valutazioni
12)per ogni calciatore visulazziare il cognome seguito dal voto massimo, dal voto minimo e dalla media dei voti e da qaunti voti ha ottenuto nelle partite che ha disputato
13)visualizzare il cognome di ogni giocatore seguito dal cognome del suo capitano
14)visualizzare i nomi delle sqaudre che non hanno calciatori
*/
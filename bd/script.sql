create database viveiro;

use viveiro;

CREATE TABLE muda (
    id_muda INT PRIMARY KEY AUTO_INCREMENT,
    nomemuda VARCHAR(100) UNIQUE, -- Adicionado UNIQUE para garantir unicidade
    tempProd INT
);

CREATE TABLE substrato (
    id_subs INT PRIMARY KEY AUTO_INCREMENT, 
    nomesubs VARCHAR(255) UNIQUE -- Adicionado UNIQUE para garantir unicidade
);

CREATE TABLE lote (
    id_lote INT PRIMARY KEY AUTO_INCREMENT,
    muda VARCHAR(255),
    subs VARCHAR(255),
    dataPlantio DATE,
    dataColheita DATE, 
    quantidade INT,
    FOREIGN KEY (muda) REFERENCES muda (nomemuda), 
    FOREIGN KEY (subs) REFERENCES substrato (nomesubs)
);

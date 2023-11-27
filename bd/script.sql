create database viveiro;

use viveiro;

CREATE TABLE muda (
    id_muda INT PRIMARY KEY AUTO_INCREMENT,
    nomemuda VARCHAR(100) UNIQUE, 
    tempProd INT
);

CREATE TABLE substrato (
    id_subs INT PRIMARY KEY AUTO_INCREMENT, 
    nomesubs VARCHAR(255) UNIQUE 
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
CREATE TABLE reservas (
    id_reserva int primary key AUTO_INCREMENT, 
    destinatario varchar(255),
    quantidade int,
    id_lote int,
    status varchar(255) DEFAULT 'pendente' NOT NULL,
    FOREIGN KEY (id_lote) REFERENCES lote(id_lote)
);




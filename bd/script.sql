create database mudas;

use mudas;

create table lote(
    id_lote int primary key auto_increment,
    muda varchar(255),
    substrato varchar(255),
    dataPlantio date,
    dataColheita date, 
    quantidade int
);

create table muda(
    id_muda int primary key auto_increment,
    nomemuda varchar(100),
    tempProd int
);
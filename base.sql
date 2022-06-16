DROP DATABASE IF EXISTS Appli_Garage_Attens;
CREATE DATABASE Appli_Garage_Attens;
USE Appli_Garage_Attens;

CREATE TABLE ville(
    id_ville        INT                 PRIMARY KEY,
    nom             VARCHAR(20)         NOT NULL,
    code_postal     VARCHAR(20)         NOT NULL
);

CREATE TABLE vehicule(
    id_vehicule         INT                 PRIMARY KEY,
    immatriculation     VARCHAR(20)         NOT NULL,
    marque              VARCHAR(20)         NOT NULL
);

CREATE TABLE client(
    id_client               INT                             PRIMARY KEY,       
    id_ville                INT                             NOT NULL,
    id_vehicule             INT                             NOT NULL,
    date_create             DATETIME                        NOT NULL UNIQUE,
    adresse                 VARCHAR(80)                     NOT NULL,
    tel                     VARCHAR(20)                     NOT NULL,
    email                   VARCHAR(80)                     NOT NULL UNIQUE,
    nom                     VARCHAR(20)                     NOT NULL,
    prenom                  VARCHAR(20)                     NULL,
    CONSTRAINT fk_ville     FOREIGN KEY (id_ville)          REFERENCES ville(id_ville),
    CONSTRAINT fk_vehicule  FOREIGN KEY (id_vehicule)       REFERENCES vehicule(id_vehicule)
);

CREATE TABLE employe(
    id_employe              INT                       PRIMARY KEY,
    id_ville                INT                       NOT NULL,    
    mot_de_passe            VARCHAR(255)               NOT NULL ,
    adresse                 VARCHAR(80)               NOT NULL,
    `role`                  VARCHAR(20)               NULL,
    statut                  VARCHAR(20)               NULL,
    nom                     VARCHAR(20)               NOT NULL,
    prenom                  VARCHAR(20)               NULL,
    tel                     VARCHAR(20)               NULL,
    email                   VARCHAR(80)               NOT NULL,
    CONSTRAINT fk_emp_ville FOREIGN KEY (id_ville)    REFERENCES ville(id_ville)
);

CREATE TABLE intervention(
    id_inter                INT                          PRIMARY KEY,
    id_client               INT                          NOT NULL,
    desc_long               VARCHAR(255)                 NOT NULL,
    desc_court              VARCHAR(255)                 NOT NULL,
    date_create             DATETIME                     NOT NULL,
    date_heure              DATETIME                     NULL,
    dure                    TIME                         NULL,
    CONSTRAINT fk_client    FOREIGN KEY (id_client)      REFERENCES client(id_client)
);

CREATE TABLE employe_interv(
    id_employe                  INT     NOT NULL,
    id_intervention             INT     NOT NULL,
    CONSTRAINT pk_emp_inter     PRIMARY KEY (id_employe, id_intervention),
    CONSTRAINT fk_employe       FOREIGN KEY (id_employe)         REFERENCES employe(id_employe),
    CONSTRAINT fk_intervention  FOREIGN KEY (id_intervention)    REFERENCES intervention(id_inter)
);
CREATE DATABASE Plateforme_de_cours;

USE Plateforme_de_cours ;


-- Table FORMATEUR
CREATE TABLE FORMATEUR (
    id_formateur INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);


-- Table MATIERE
CREATE TABLE MATIERE (
    id_matiere INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom_matiere VARCHAR(100) NOT NULL,
    description VARCHAR(500)
);


-- Table COURS
CREATE TABLE COURS (
    id_cours INT(11) AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    description VARCHAR(500),
    duree INT(3) NOT NULL,
    id_formateur INT(11) NOT NULL,
    id_matiere INT(11) NOT NULL,

    FOREIGN KEY (id_formateur)
        REFERENCES FORMATEUR(id_formateur),

    FOREIGN KEY (id_matiere)
        REFERENCES MATIERE(id_matiere)
);

USE athna ;

CREATE TABLE utilisateur (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nom_complet VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('ADMIN','CHEF_PROJET','MEMBRE') NOT NULL
    
);

SELECT * FROM utilisateur

CREATE TABLE projets (
    id_projet INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    description TEXT,
    statut ENUM('actif','inactive'),
    date_create DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_chef_projet INT NOT NULL,

    FOREIGN KEY (id_chef_projet)
    REFERENCES utilisateur(id_user)
    ON DELETE RESTRICT
);

SELECT * FROM projets

CREATE TABLE sprints (
    id_sprint INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    id_projet INT NOT NULL,
    FOREIGN KEY (id_projet)
    REFERENCES projets(id_projet)
    ON DELETE CASCADE
);

INSERT INTO sprints (titre, date_debut, date_fin, id_projet)
VALUES ('Sprint 1', '2026-01-10', '2026-01-24', 1);

ALTER TABLE sprints
ADD COLUMN statut ENUM('A_VENIR','EN_COURS','TERMINEE') DEFAULT 'A_VENIR';

SELECT * FROM sprints

CREATE TABLE taches (
    id_tache INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    description TEXT,
    statut ENUM ('A_FAIRE','EN_COURS','TERMINEE'),
    id_sprint INT NOT NULL,

    FOREIGN KEY (id_sprint)
    REFERENCES sprints(id_sprint)
    ON DELETE CASCADE
);

CREATE TABLE user_taches (
    id_user_taches INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_tache INT NOT NULL,
    FOREIGN KEY (id_user) 
    REFERENCES utilisateur(id_user)
    ON DELETE CASCADE,
    FOREIGN KEY (id_tache) 
    REFERENCES taches(id_tache)
    ON DELETE CASCADE
);

CREATE TABLE comments (
    id_comment INT AUTO_INCREMENT PRIMARY KEY,
    contenu TEXT NOT NULL,
    id_user INT NOT NULL,
    id_tache INT NOT NULL,
    FOREIGN KEY (id_user) 
    REFERENCES utilisateur(id_user)
    ON DELETE CASCADE,
    FOREIGN KEY (id_tache) 
    REFERENCES taches(id_tache)
    ON DELETE CASCADE

);

CREATE TABLE notifications (
    id_notif INT AUTO_INCREMENT PRIMARY KEY,
    type ENUM ('CREATION_TACHE','CHANGEMENT_STATUT','COMMENTAIRE') NOT NULL,
    message TEXT NOT NULL,
    sent_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_user INT NOT NULL,

    FOREIGN KEY (id_user)
    REFERENCES utilisateur(id_user)
    ON DELETE CASCADE
);

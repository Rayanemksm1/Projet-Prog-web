CREATE DATABASE IF NOT EXISTS hopital_db;
USE hopital_db;

CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('patient', 'medecin', 'admin') DEFAULT 'patient'
);

CREATE TABLE rendezvous (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT,
    medecin_id INT,
    date_rendezvous DATETIME NOT NULL,
    statut ENUM('en attente', 'confirmé', 'annulé') DEFAULT 'en attente',
    FOREIGN KEY (patient_id) REFERENCES utilisateurs(id),
    FOREIGN KEY (medecin_id) REFERENCES utilisateurs(id)
);

-- Exemple d'utilisateur administrateur
INSERT INTO utilisateurs (nom, email, mot_de_passe, role)
VALUES ('Admin Principal', 'admin@hopital.com', 'admin123', 'admin');


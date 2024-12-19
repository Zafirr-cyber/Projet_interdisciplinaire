/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Création de la base de données
CREATE DATABASE IF NOT EXISTS dbrehabilitation;
USE dbrehabilitation;

-- --------------------------------------------------------
-- Structure de la table departement
-- --------------------------------------------------------
CREATE TABLE  departement (
  departement_id INT(11) NOT NULL AUTO_INCREMENT,
  departement_nom VARCHAR(100) NOT NULL,
  departement_description VARCHAR(255) NOT NULL,
  PRIMARY KEY (departement_id)
);

-- --------------------------------------------------------
-- Structure de la table equipement_rehabilitation
-- --------------------------------------------------------
CREATE TABLE equipement_rehabilitation (
  equipement_id INT(11) NOT NULL AUTO_INCREMENT,
  type_equipement VARCHAR(100) NOT NULL,
  disponible TINYINT(1) NOT NULL DEFAULT 1,
  date_modification DATE NOT NULL,
  departement_id INT(11),
  PRIMARY KEY (equipement_id),
  FOREIGN KEY (departement_id) REFERENCES departement(departement_id) ON DELETE SET NULL
);

-- --------------------------------------------------------
-- Structure de la table lits_rehabilitation
-- --------------------------------------------------------
CREATE TABLE lits_rehabilitation (
  lit_id INT(11) NOT NULL AUTO_INCREMENT,
  disponible TINYINT(1) NOT NULL DEFAULT 1,
  type_lit ENUM('intensif','standard','pediatrique') NOT NULL,
  date_creation DATE NOT NULL,
  date_modification DATE NOT NULL,
  PRIMARY KEY (lit_id)
  );

-- --------------------------------------------------------
-- Structure de la table patients_réhabilitation
-- --------------------------------------------------------
CREATE TABLE patients_réhabilitation (
  patient_id INT(11) NOT NULL AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL,
  prenom VARCHAR(255) NOT NULL,
  lit_id INT(11) NOT NULL,
  departement_id INT(11),
  PRIMARY KEY (patient_id),
  FOREIGN KEY (lit_id) REFERENCES lits_rehabilitation(lit_id) ON DELETE CASCADE,
  FOREIGN KEY (departement_id) REFERENCES departement(departement_id) ON DELETE SET NULL
);

-- --------------------------------------------------------
-- Structure de la table personnel_medical
-- --------------------------------------------------------
CREATE TABLE personnel_medical (
  personnel_medical_id INT(11) NOT NULL AUTO_INCREMENT,
  nom VARCHAR(100) NOT NULL,
  prenom VARCHAR(100) NOT NULL,
  departement_id INT(11),
  PRIMARY KEY (personnel_medical_id),
  FOREIGN KEY (departement_id) REFERENCES departement(departement_id) ON DELETE SET NULL
);

CREATE TABLE suivi_patients (
  id_suivi INT(11) NOT NULL AUTO_INCREMENT, 
  id_patient INT(11) NOT NULL,             
  date_mesure DATE NOT NULL,              
  progression DECIMAL(5,2) NOT NULL,       
  PRIMARY KEY (id_suivi),                  
  FOREIGN KEY (id_patient) REFERENCES patients_réhabilitation(patient_id) 
  ON DELETE CASCADE                         
);
DROP TABLE if exists client;
CREATE TABLE client (
  id INTEGER PRIMARY KEY,
  nom TEXT,
  prenom TEXT,
  email TEXT UNIQUE,
  motdepasse TEXT,
  emailVerifie INTEGER,
  CONSTRAINT name_unique UNIQUE (email)
);

DROP TABLE if exists categorie;

CREATE TABLE categorie(
  id INTEGER PRIMARY KEY,
  nom TEXT,
  idpere INTEGER,
  idTitreGlobal INTEGER
);

DROP TABLE if exists annonce;

CREATE TABLE annonce (
	id INTEGER PRIMARY KEY,
  idClient INTEGER,
  categorie INTEGER,
	titre TEXT,
  contenu TEXT,
  adresse TEXT,
  nbParticipant INTEGER,
  nbInteresse INTEGER,
  departement TEXT,
  datePrevu INTEGER,
  dateHeure INTEGER,
	photo1 TEXT,
  photo2 TEXT,
  photo3 TEXT,
	FOREIGN KEY(idClient) REFERENCES client(id),
  FOREIGN KEY(categorie) REFERENCES categorie(id)
);

DROP TABLE if exists favoris;

CREATE TABLE favoris (
  idClient INTEGER,
  idAnnonce INTEGER,

  PRIMARY KEY(idClient,idAnnonce),
  FOREIGN KEY(idClient) REFERENCES client(id),
  FOREIGN KEY(idAnnonce) REFERENCES annonce(id)
);

DROP TABLE if exists departement;

CREATE TABLE departement (
  id INTEGER PRIMARY KEY,
  departement_code TEXT,
  region_nom TEXT,
  departement_nom TEXT,
  CONSTRAINT departement_unique UNIQUE (departement_code)
);

DROP TABLE if exists admin;

CREATE TABLE admin(
  id INTEGER PRIMARY KEY,
  FOREIGN KEY(id) REFERENCES client(id)
);


-- .separator |
-- .import categorie.txt categorie
-- .import departement.txt departement
-- .import annonces.txt	annonce
-- .import clients.txt client

-- INSERT INTO admin VALUES(1);

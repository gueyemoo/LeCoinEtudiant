DROP TABLE if exists client;
CREATE TABLE client (
  id INTEGER PRIMARY KEY,
  nom TEXT,
  prenom TEXT,
  email TEXT UNIQUE,
  pass TEXT,
  numero TEXT,
  emailVerifie INTEGER,
  CONSTRAINT name_unique UNIQUE (email)
);

DROP TABLE if exists categorie;

CREATE TABLE categorie(
  id INTEGER PRIMARY KEY,
  nom TEXT,
  idpere INTEGER
);

DROP TABLE if exists annonce;

CREATE TABLE annonce (
	idAnnonce INTEGER PRIMARY KEY,
  idClient INTEGER,
  categorie INTEGER,
	titre TEXT,
  contenu TEXT,
  prix REAL,
  departement TEXT,
  dateHeure INTEGER,
	photo1 TEXT,
  photo2 TEXT,
  photo3 TEXT,
	FOREIGN KEY(idClient) REFERENCES client(id),
  FOREIGN KEY(categorie) REFERENCES categorie(id)
);



DROP TABLE if exists departement;

CREATE TABLE departement (
  departement_id INTEGER PRIMARY KEY,
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


.separator |
.import categorie.txt categorie
.import departement.txt departement
.import annonces.txt	annonce
.import clients.txt client

-- INSERT INTO admin VALUES(1);

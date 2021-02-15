Use Projet;

Create Table Client(
identifiant varChar(255),
mdp varChar(255),
adresse varChar(255),
quartier varChar(255),
estProducteur boolean default false,
Constraint pkClient Primary Key (identifiant)
);

Create Table Livraison(
numLivraison int auto_increment,
idClient varChar(255),
frequence varChar(255),
dateCommande date,
statut varChar(255) default 'Non confirmée',
numGroupe int,
Constraint pkLivraison Primary Key (numLivraison),
Constraint fkClientLivraison Foreign Key (idClient) References Client (identifiant)
);

Create Table Produit(
numProduit int auto_increment,
nom varChar(255),
famille varChar(255),
stock float,
prix float,
image varChar(255),
Constraint pkProduit Primary Key (numProduit)
);

Create Table Contient(
numLivraison int,
numProduit int,
quantite float,
Constraint pkContient Primary Key (numLivraison, numProduit),
Constraint fkContientLivraison Foreign Key (numLivraison) References Livraison (numLivraison),
Constraint fkContientProduit Foreign Key (numProduit) References Produit (numProduit)
);

Drop Table Contient;
Drop Table Produit;
Drop Table Livraison;
Drop Table Client;
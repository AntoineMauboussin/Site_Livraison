Use Livraison;

Insert into Produit ( nom, famille, stock, prix, image) values ('Reinette', 'Pomme', '40', '1','../Ressource/reinette.jpg');
Insert into Produit ( nom, famille, stock, prix, image) values ('Golden', 'Pomme', '30', '1.2','../Ressource/golden.jpg');
Insert into Produit ( nom, famille, stock, prix, image) values ('Butternuts', 'Cucurbitacés', '50', '0.5','../Ressource/butternut.jpg');
Insert into Produit ( nom, famille, stock, prix, image) values ('Potimarrons', 'Cucurbitacés', '70', '0.4','../Ressource/potimarron.jpg');

Insert into Client values ('Jory', '1234', '12 Rue Jory', '1', 1);
Insert into Livraison ( idClient, frequence, dateCommande, statut, numGroupe) values ('Jory', 'Ponctuelle', SYSDATE(), 'En attente', Null);
Insert into Contient values (1, 1, 0.5);
Insert into Contient values (1, 3, 2);

Insert into Client values ('Elora', '1234', '14 Rue Elora', '2', 0);
Insert into Client values ('Walter', '1234', '22 Rue Walter', '2', 0);
Insert into Client values ('Maiya', '1234', '65 Rue Maiya', '2', 0);
Insert into Client values ('Neven', '1234', '43 Rue Neven', '4', 0);

Insert into Livraison ( idClient, frequence, dateCommande, statut, numGroupe) values ('Elora', 'Ponctuelle', '2021-01-03', 'En attente', null);
Insert into Livraison ( idClient, frequence, dateCommande, statut, numGroupe) values ('Walter', 'Ponctuelle', '2021-01-03', 'En attente', null);
Insert into Livraison ( idClient, frequence, dateCommande, statut, numGroupe) values ('Maiya', 'Ponctuelle', '2021-01-03', 'Non confirmée', Null);
Insert into Livraison ( idClient, frequence, dateCommande, statut, numGroupe) values ('Neven', 'Ponctuelle', SYSDATE(), 'Non confirmée', Null);

Insert into Contient values (2, 2, 0.6);
Insert into Contient values (3, 3, 3);
Insert into Contient values (3, 2, 1);
Insert into Contient values (4, 4, 2);
Insert into Contient values (4, 1, 1);
Insert into Contient values (5, 2, 1);

Update Livraison set numGroupe = numLivraison where numLivraison = 2;
Update Livraison set numGroupe = 2 where numLivraison = 3;

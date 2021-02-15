/*Permet d'obtenir le contenu d'une livraison groupée à partir de son numéro */
Select nom, ROUND(SUM(quantite),2) as QuantiteTotale
From Livraison natural join Contient natural join Produit
Where numGroupe = ?
and statut not in ('En attente', 'Livrée')
Group by nom;

Select nom, ROUND(SUM(quantite),2) as QuantiteTotale
From Livraison natural join Contient natural join Produit
Where numGroupe = ?
and statut not in ('En attente', 'Livrée')
Group by nom;

/*Permet de mettre à jour le suivi des commandes non groupées à partir de leur numéro*/
Update Livraison set statut = 'Confirmée' where numLivraison = ?;
Update Livraison set statut = 'En livraison' where numLivraison = ?;
Update Livraison set statut = 'Livrée' where numLivraison = ?;

/*Permet de mettre à jour le suivi des commandes groupées à partir de leur numéro de groupe*/
Update Livraison set statut = 'Confirmée' where numGroupe = ?;
Update Livraison set statut = 'En livraison' where numGroupe = ?;
Update Livraison set statut = 'Livrée' where numGroupe = ?;

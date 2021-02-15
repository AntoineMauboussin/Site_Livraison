/*Permet d'obtenir le contenu d'une livraison group�e � partir de son num�ro */
Select nom, ROUND(SUM(quantite),2) as QuantiteTotale
From Livraison natural join Contient natural join Produit
Where numGroupe = ?
and statut not in ('En attente', 'Livr�e')
Group by nom;

Select nom, ROUND(SUM(quantite),2) as QuantiteTotale
From Livraison natural join Contient natural join Produit
Where numGroupe = ?
and statut not in ('En attente', 'Livr�e')
Group by nom;

/*Permet de mettre � jour le suivi des commandes non group�es � partir de leur num�ro*/
Update Livraison set statut = 'Confirm�e' where numLivraison = ?;
Update Livraison set statut = 'En livraison' where numLivraison = ?;
Update Livraison set statut = 'Livr�e' where numLivraison = ?;

/*Permet de mettre � jour le suivi des commandes group�es � partir de leur num�ro de groupe*/
Update Livraison set statut = 'Confirm�e' where numGroupe = ?;
Update Livraison set statut = 'En livraison' where numGroupe = ?;
Update Livraison set statut = 'Livr�e' where numGroupe = ?;


Create or replace view CommandesSimple As
Select identifiant, numLivraison, adresse, dateCommande, nom, quantite
From Livraison L join Client C on L.idClient = C.identifiant natural join Contient natural join Produit
where numGroupe is null
and statut not in ('En attente', 'Livrée')
Order by dateCommande, numLivraison;

Create or replace view CommandesGroupe As
Select numGroupe, adresse, dateCommande
From Livraison L join Client C on L.idClient = C.identifiant
Where numLivraison = numGroupe
and statut not in ('En attente', 'Livrée')
Order by dateCommande;


Create or replace view Stock As
Select nom, stock
From Produit;

Select * from CommandesGroupe;

Select * from CommandesSimple;

Select * from Stock;
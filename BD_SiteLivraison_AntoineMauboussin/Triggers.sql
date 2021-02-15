/*Vérifie que la chaine entrée en statut est valide*/
Create trigger verif_statut
Before Insert on Livraison
for each row 
begin
If new.statut not in ('En attente','Non confirmée','Confirmée','En livraison','Livrée')
then
signal sqlstate '45000'
SET MESSAGE_TEXT = 'Statut incorrect';
End if;
End;

Create trigger verif_statut1
Before Update on Livraison
for each row 
begin
If new.statut not in ('En attente','Non confirmée','Confirmée','En livraison','Livrée')
then
signal sqlstate '45000'
SET MESSAGE_TEXT = 'Statut incorrect';
End if;
End;

/*Vérifie que la chaine entrée en fréquence est valide*/
Create trigger verif_frequence
Before Insert on Livraison
for each row 
begin
If new.frequence not in ('Ponctuelle','Hebdomadaire','Mensuelle','Panier')
then
signal sqlstate '45000'
SET MESSAGE_TEXT = 'Frequence incorrect';
End if;
End;

Create trigger verif_frequence1
Before Update on Livraison
for each row 
begin
If new.frequence not in ('Ponctuelle','Hebdomadaire','Mensuelle','Panier')
then
signal sqlstate '45000'
SET MESSAGE_TEXT = 'Frequence incorrect';
End if;
End;

/*Crée le bon contenu de commande lors de la commande du panier hebdomadaire*/
Create trigger contenuPanier
After Insert on Livraison
for each row 
begin
If new.frequence = 'Panier'
then
Insert into Contient Select new.numLivraison, numProduit, Quantite from contient where numLivraison = 1;
End if;
End;

/* Met à jour la date et le contenu des commandes de panier une fois livrées */
Create trigger actualiserPanier
Before update on Livraison
for each row
begin
If new.statut = 'Livrée' and new.frequence = 'Panier'
then
set new.dateCommande = DATE_ADD(new.dateCommande, INTERVAL 7 DAY);
set new.statut = 'Non confirmée';
delete from Contient where numLivraison = new.numLivraison;
insert into Contient Select new.numLivraison, numProduit, Quantite from contient where numLivraison = 1;
End if;
End;

/* Met à jour la date des commandes pèriodiques une fois livrées */
Create trigger actualiserHebdomadaire
Before update on Livraison
for each row
begin
If new.statut = 'Livrée' and new.frequence = 'Hebdomadaire'
then
set new.dateCommande = DATE_ADD(new.dateCommande, INTERVAL 7 DAY);
set new.statut = 'Non confirmée';
End if;
End;

Create trigger actualiserMensuelle
Before update on Livraison
for each row
begin
If new.statut = 'Livrée' and new.frequence = 'Mensuelle'
then
set new.dateCommande = DATE_ADD(new.dateCommande, INTERVAL 30 DAY);
set new.statut = 'Non confirmée';
End if;
End;

/*Réduit le prix d'un produit dont le stock est trop important*/
Create trigger promotion
Before update on Produit
for each row
Begin
if new.stock > 100
and old.stock <= 100
then
set new.prix = round(old.prix - 0.3*old.prix,2);
end if;
end;

/*Rétablit le prix d'un produit dont le stock a suffisement baissé*/
Create trigger annulerPromotion
Before update on Produit
for each row
Begin
if new.stock < 70
and old.stock >= 70
then
set new.prix = round(old.prix/0.7,2);
end if;
end;

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-Facture</title>
</head>
    <body>
        <div>{{client->reference_contrat}}</div>
        <div>{{client->delegation}}</div>
        <div>{{produit->compte_collectif}}</div>
        <div>{{client->compte_auxilliaire}}</div>
        <div>{{produit->codification_budgetaire}}</div>
        <div>{{client->designation}}</div>
        <div>{{produit->designation}}</div>
        <div>{{client->phone}}</div>
        <div>{{data_facturation->montantTotal}}</div>
        <!-- montant en lettre ausssi
             montant de chaque produit
             numéro de facture -->
        <div>{{}}</div>
    </body>
</html>

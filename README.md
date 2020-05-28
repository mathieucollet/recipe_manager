# Recipe Manager

Projet scolaire visant à mettre en place une gestionnaire de recette, avec une base de donnée.

Le point principal du projet étant d'utiliser un ORM pour exécuter les requêtes SQL.

## Équipe
Projet réalisé par Cédric B, Mathieu C et Jérémy L.

## Utilisation
Vous pouvez créer un utilisateur et utiliser la plateforme comme bon vous semble.

Deux utilisateurs existent par défaut :
- Login : user@user.user - Mdp : useruser
- Admin : admin@admin.admin - Mdp : adminadmin

## Stack
- Framework PHP Laravel 7
- ORM de Laravel : Eloquent
- BDD MySql
- Framework CSS Bootstrap 4
- Framework JS JQuery
- Icon Library Material Icons
- WYSIWYG Summernote

## Réalisations
- Voir les recettes partagées sans être connecté
- Créer un compte utilisateur
- Manager une liste d'ingrédient (Create, Read, Update, Delete) propre à l'utilisateur connecté, utilisables à la création d'une recette.
- Manager une liste de recettes (Create, Read, Update, Delete) propre à l'utilisateur.
- En tant qu'administrateur, manager une liste de tags (Create, Read, Update, Delete), utilisables à la création d'une recette.
- Choisir de partager ou non une recette sur la plateforme.
- Possibilité de "liker" des recettes (même les siennes), et de les retrouver dans une page dédiée.
- Système de recherche de recette basée sur le nom, la description et les tags.
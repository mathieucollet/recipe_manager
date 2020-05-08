# Recipe Manager

## Install
1 - Installer les dépendances de composer

`composer install`

2 - Installer les dépendances de npm

`npm install && npm run dev`

3 - Créer une base de donnée dans MySQL

4 - Configurer votre BDD dans le fichier .env

DB_CONNECTION=mysql

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_de_botre_bdd
DB_USERNAME=username
DB_PASSWORD=password
```

5 - Enfin dans le dossier du projet faire :
`php artisan serve`

Et vous rendre à l'url qui vous est donnée
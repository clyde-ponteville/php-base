# Pizza Store PDO SQL

- Récupérer un backup de la Bdd pizzastore
L'intérêt est de pouvoir recréer la structure de la base à tous moment.

Au niveau du PHP, on va crée quelques fichiers / dossier:
- config/database.php -> Connexion à la base de données en PDO, sera inclus dans tous les fichiers PHP
- partials/header.php
- partials/footer.php
- index.php -> la page d'accueil du site
- pizza_list.php -> Lister toutes les pizzas de la base de données
- pizza_single.php -> La page d'une pizza seule

Au niveau du FRONT
- assets/ -> Dossier qui contiendra le css, le js, les images
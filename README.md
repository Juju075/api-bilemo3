## P8_Api Bilemo

Project 8 du "parcours développeur d'application PHP/Symfony" d'Openclassrooms.
Ce projet consite à la création d'une api

Vous pouvez les retrouver ici

====================

SymfonyInsight badge
https://insight.symfony.com/projects/029eb122-0ab8-4dc2-9043-57c8164a07d4/analyses/5

====================

VEUILLEZ UTILISER POSTMAN POUR CONSULTER L'API
token non disponible sur Swagger.
https://www.postman.com/

====================

## Table des matières.

1. [Pre required](#Pré-requis)
2. [Installation](#Instalation)
3. [Affichage de l'App](#use)
4. [Fait avec](#Fait-avec)
5. [Auteur](#Auteur)

## Pré requis

Environnement

- _PHP_ (7.4.12)
- _Apache_ (2.4.46)
- _MySQL_ (8.0.22)
- _Composer_ (2.0.9)

## Installation

- Get sources files / Cloner le repository du projet. [Here](https://github.com/Juju075/api-bilemo3)
  > Make sure the `www` repository, is at the root of your server, you can also create a virtual host that redirect the visitors to the `www` directory.

_Go with a console to the repository and do thoses commands_

- `composer install`
- `composer update`

- Créer la database en locale.
  Base de données : `api_bilemo3`
  php bin/console doctrine:database:create
- Crée le schema de la database.
  php bin/console doctrine:migrations:migrate

-Methode 1 - Charger le script sql dans phpmyadmin (creation de la base de données et du jeux de donees.)

- Lien de saisie: http://localhost/phpmyadmin/server_sql.php
- Fichier à charger: api_bilemo3.sql (à la racine du projet)

OU

-Methode 2 - Creation d'un jeux de donees via une fixture

Apres avoir installe entierement le projet et installe les dependences.
lancer le Terminal et saisiser la commande suivante:

php bin/console doctrine:fixtures:load

- Generer les SSH Keys JWTAuthentication et passphrase key dnas .env
  voir procédure ici;
  https://github.com/lexik/LexikJWTAuthenticationBundle/blob/2.x/Resources/doc/index.md#configuration

=====================
Connexion à la Bdd.

- Creer un fichier config.json
  pour permettre au code de trouver les identifiants
  de connexion a la base de donnees.

{
"host": "localhost",
"dbname": "api_bilemo3",
"user": "vos identifiant personnel",
"pass": "votre mot de passe personnel"
}

======================

## use

Lancer dans votre navigateur:
localhost .../api/doc (Documentation Swagger)

1- Activer Wamp
2- Terminal cmd:
@ symfony server:start -d
3- Terminal cmd
@ symfony open:local

Documentation pdf
api_bilemo_documentation.pdf

- Authentification

Si methode 1 chargement de la base de donnés (sql)

- login :
- password : identique

Si methode 2 creation d'un nouveau jeux de données via Fixture.

- login : choisir un user au hasard
- password : identique

## Bundle utilisé

- doctrine-fixtures-bundle - Generation de jeux de données.
- jm serializer bundle -
- lexik/jwt-authentication-bundle - https://github.com/lexik/LexikJWTAuthenticationBundle

### Auteur

- **Bempime KHEVE** (https://github.com/Juju075)

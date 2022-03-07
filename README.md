## P8_Api Bilemo

Project 8 du "parcours développeur d'application PHP/Symfony" d'Openclassrooms.<br/>
Ce projet consite à la création d'une apiRESTFull

Vous pouvez les retrouver ici<br/>

====================

SymfonyInsight badge<br/>
https://insight.symfony.com/projects/029eb122-0ab8-4dc2-9043-57c8164a07d4/analyses/5

====================

VEUILLEZ UTILISER POSTMAN POUR CONSULTER L'API<br/>
token non disponible sur Swagger.<br/>
https://www.postman.com/

====================<br/>
MANUEL TECHNIQUE

Veuillez telecharger le fichier cidessous la racine du projet:<br/>
api_bilemo.pdf

====================

## Table des matières.

1. [Pre required](#Pré-requis)
2. [Installation](#Instalation)
3. [Affichage de l'App](#use).
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

=====================<br/>
Connexion à la Bdd.

- Creer un fichier config.json<br/>
  pour permettre au code de trouver les identifiants<br/>
  de connexion a la base de donnees.<br/>

{
"host": "localhost",<br/>
"dbname": "api_bilemo3",<br/>
"user": "vos identifiant personnel",<br/>
"pass": "votre mot de passe personnel"<br/>
}

======================

## use

Lancer dans votre navigateur:<br/>
localhost .../api/doc (Documentation Swagger)<br/>

1- Activer Wamp<br/>
2- Terminal cmd:<br/>
@ symfony server:start -d<br/>
3- Terminal cmd<br/>
@ symfony open:local<br/>

Documentation pdf<br/>
api_bilemo_documentation.pdf<br/>

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

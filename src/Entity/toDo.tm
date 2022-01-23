90% - diagrammes

[1]- use case
[1]- diag de class
[1]- model relationnel
[ ]- diag de sequence (ajouter un user lié)

==============================
[1/2]Entete titre et description de l'Api

==============================
100% - Fixture add user lié a des clients
4 clients au total ds la bdd getReference()
UsersFixtures.testsPHP
chaque client possede entre 3 et 12 utilisateurs
utilisateur ( prenom et nom )

==============================
Faire les endpoint validé en mentorat

[1]Consulter la liste des produits BileMo:                                                              GET collection/produits
[1]Consulter la liste des utilisateurs inscrits liés à un client sur le site web: GET clients      >>>  GET api/client/{id}/user
[1]Consulter les détails d’un produit BileMo:                                                           GET /produit/{id}
[1]Consulter le détail d’un utilisateur inscrit lié à un client: get itemoperation {id} use             GET api/client/{id}/users/{user_id}
[1]Ajouter   un nouvel utilisateur lié à un client:bundel sensio autogere id  avoir                     POST api/clients/{id}/user   
[1]Supprimer un utilisateur ajouté par un client:                                                       DELETE api/clients/{id}/user


ok si valide sur Postman
http://127.0.0.1:8000/

[ok] GET    api/client/{id}/users   [ok]load UsersFixtures.
[1]  GET    api/client/{id}/user/{user_id}  >> Documentation 2 params.
[1]  POST   api/client/{id}/user   Custom Operation >> Grosse erreur de documentation à recrire $client->addUser()
[ok] DELETE api/client/{id}/users 


[ok] GET    api/collection/produits 
[ok] GET    api/produit/{id}


 


avec token.

==============================
Ameliorer la documentation swagger
OpenApi
https://api-platform.com/docs/core/openapi/

use ApiProperty  openapi_context

- nom des fonctions.
- parametres des fonctions.

==============================
Operation (Ajout d'un utilisateur à 1 client.)
POST /api/clients/{id}/user      
Param: 43  >> 
| "client": "string", | client_id
| "userproduct": { "user": [ "string" "produit": "string" |
date autogener

Body:
application/json
>>>> event hass

{
  "email": "test@gmail.com",
  "roles": [
    "ROLE_USER"
  ],
  "password": "identique",
  "users": [
    {
      "prenom": "prenomtest",
      "nom": "nomtest",
      "client": "string",
      "userproduct": {
        "user": [
          "string"
        ],
        "produit": "string"
      },
      "createdAt": "CURRENT_TIMESTAMP",
      "updatedAt": "CURRENT_TIMESTAMP"
    }
  ],
  "createdAt": "CURRENT_TIMESTAMP",
  "updatedAt": "CURRENT_TIMESTAMP"
}

==============================
Login JWToken configuration et test
api/login postman

{² "é5TBRqs
    "username": "prosacco.patricia@walsh.com",
    "password": "identique"
 }

==============================
[1] Login ApiLoginController.php
api/login

Security componet Auth user (Json login)
https://symfony.com/doc/current/security.html#json-login




Expected:
{
    "user": "dunglas@example.com",
    "token": "45be42..."
}

==============================
Ecrire des testsPHP Unit
Enrironnement de test a mettre en place

login
creation user
delete user

==============================
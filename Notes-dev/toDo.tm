90% - diagrammes

[1]- use case
[1]- diag de class
[1]- model relationnel
[1]- diag de sequence (ajouter un user lié)

ATTENTION SECURITE
- doit etre connecté
- doit etre identifié comme Administrateur lié à la requete.
- Interdire les doublons (verif unique email user)

==============================
[1/2]Entete titre et description de l'Api

==============================
100% - Fixture add user lié à des clients (ManyToMany)
4 clients au total ds la bdd getReference()
UsersFixtures.testsPHP
chaque client possede entre 3 et 12 utilisateurs
utilisateur ( prenom et nom )
[]Modifier fixture

==============================
Faire les endpoints validé en mentorat

[1]Consulter la liste des produits BileMo:                                                              GET collection/produits
[1]Consulter la liste des utilisateurs inscrits liés à un client sur le site web: GET clients      >>>  GET api/client/{id}/user
[1]Consulter les détails d’un produit BileMo:                                                           GET /produit/{id}
[1]Consulter le détail d’un utilisateur inscrit lié à un client: get itemoperation {id} use             GET api/client/{id}/users/{user_id}
[1]Ajouter   un nouvel utilisateur lié à un client                   POST api/clients/{id}/user   
[1]Supprimer un utilisateur ajouté par un client:                                                       DELETE api/clients/{id}/user


Richarson 
conuslter list produit li

ok si valide sur Postman
http://127.0.0.1:8000/

[ok] GET    api/client/{id}/users   [ok]load UsersFixtures.
[1]  GET    api/client/{id}/user/{user_id}  >> Documentation 2 params.
[ok] POST   api/client/{id}/user   Custom Operation >> Grosse erreur de documentation à recrire $client->addUser()  FAIRE UN CONTROLLEUR
[ok] DELETE api/client/{id}/users 


[ok] GET    api/collection/produits 
[ok] GET    api/produit/{id}
==============================
Risque de securité Client dans la reponse.
Affichage du password
==============================
Login_check
http://127.0.0.1:8000/api/login_check

{
    "username": "christop17@hotmail.com",
    "password": "identique"
}
eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2NDMwMjgxODksImV4cCI6MTY0MzAzMTc4OSwicm9sZXMiOlsiUk9MRV9VU0VSIl0sInVzZXJuYW1lIjoieWxlc2NoQGtsb2Nrby5jb20ifQ.kziQtqZJrFGmJFm0dhIiOfFyq95VRPPOXMDvpT5OUc0ckAiBu1S4NsPLWGxFoirBDtsM45pv0EUSueNL015oIMqhZuZecdfKyfhzefqsQW1IACP_5arVszVYOYS3ej6pRzMD6Cj72dUQ91iLVl52b3ReB_R51FXn5fmIz9ZSZvEXMJUzEgzTr6KTs7BYS3nOeRj8CocLopsveys0j32sxw0ZljccSb4yjJrmG4rtSOa_uf4aCHWt6ompECYpKXR4R5MhFwNyocRDZOlsF2U7ze-d6kr5WXfOP4kAiS7lPcPlYEJ_QQNjVrQLo4Qp4_VmYHa08NBF7fNi1JAa7bLHYQ
==============================
ApiPlatform active token aussi
==============================
Ameliorer la documentation swagger
OpenApi
https://api-platform.com/docs/core/openapi/

use ApiProperty  openapi_context
Decorate 

[ok]Titre & description des operations.
[ ]Parametres
[ ]Request Body
[ ]Response
[ ]Schema

Pour les Operation non utilise (les retirer correctement)
Supprimer correctement les routes Not found

"get"={
"controller"="NotFoundAction ::class",
"read"="false",
"output"="false",
 }

==============================
Operation (Ajout d'un utilisateur à 1 client.)
POST /api/clients/{id}/user      
Param: 41  >> 
| "client": "string", | client_id
| "userproduct": { "user": [ "string" "produit": "string" |

URI
http://127.0.0.1:8000/api/client/41/user

date autogenere
https://jsonformatter.curiousconcept.com/#

Expected: 201 (statut created)

Header:
Content-Type | application/json

Body:
application/json
>>>> event hass

*****************
Json User (client_id)
*****************
Demande identifiant du client et les datas User à inserer.
client product ?

Authorization:

==============================
Login JWToken configuration et test
api/login postman

{
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
Autodecouvrable (Maturite Niv3)
https://github.com/willdurand/Hateoas*
-
- Fonctions optionnel
==============================
Documentation
==============================
Gestion des erreurs
https://openclassrooms.com/fr/courses/4087036-construisez-une-api-rest-avec-symfony/4333906-gestion-des-erreurs
throw exeption 404-
==============================
Pagination

[ok]modification dans api_platform.yaml

  defaults:
    pagination_items_per_page: 8

resultat "hydra:view": 
==============================
les contraintes de REST
Gestion des erreurs
Exceptions
==============================
Pagination ok
==============================
Groups

Ne pas exposer
http://127.0.0.1:8000/api/produit/936

Groups
contex id type created at updated at en READ
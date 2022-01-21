Apiplatform methods >> Operation
pas besoins de personnalise pris en charge auto par le bundle?

CRUD
Operations
API Platform Core relies on the concept of operations. 
Operations can be applied to a resource exposed by the API. 
From an implementation point of view, 
an operation is a link between a resource, 
a route and its related controller.

==============================
[1]Consulter la liste des produits BileMo:                                                              GET collection/produits
[1]Consulter la liste des utilisateurs inscrits liés à un client sur le site web: GET clients      >>>  GET api/client/{id}/user
[1]Consulter les détails d’un produit BileMo:                                                           GET /produit/{id}
[1]Consulter le détail d’un utilisateur inscrit lié à un client: get itemoperation {id} use             GET api/client/{id}/users/{user_id}
[1]Ajouter   un nouvel utilisateur lié à un client:bundel sensio autogere id  avoir                     POST api/clients/{id}/user   
[1]Supprimer un utilisateur ajouté par un client:                                                       DELETE api/clients/{id}/user


[ok] GET    api/collection/produits
[1]  GET    api/produit/{id}
[1]  GET    api/client/{id}/user
[1]  DELETE api/clients/{id}/user
[1]  POST   api/clients/{id}/user   bundel sensio autogere id  avoir
[1]  GET    api/client/{id}/users/{user_id}

==============================
Ameliorer la documentation swagger
- nom des fonctions
- parametres des fonctions


CreateProduit::class

{
  "name": "string",
  "model": "string",
  "description": "string",
  "price": 0,
  "createdAt": "CURRENT_TIMESTAMP",
  "updatedAt": "CURRENT_TIMESTAMP"
}
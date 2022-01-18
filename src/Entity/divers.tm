consulter la liste des produits BileMo ; get collection produit

consulter les détails d’un produit BileMo ; get iteoperation produit {id}

consulter la liste des utilisateurs inscrits liés à un client sur le site web ; get clients      >>>   api/client/{id}/user

consulter le détail d’un utilisateur inscrit lié à un client ; get itemoperation {id} use   api/client/{id}/users/{user_id}

ajouter un nouvel utilisateur lié à un client ; post api/clients/{id}/user   bundel sensio autogere id  avoir

supprimer un utilisateur ajouté par un client.   delete api/clients/{id}/user
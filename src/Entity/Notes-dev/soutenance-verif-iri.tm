Soutenance verification api 


gestions erreurs: 404 fonctionne

=========================
1/7 [OK]
login: ok fonctionne tres stable

========================= Custom controller
2/7 [NO]
api/client/{id}/user | http://127.0.0.1:8000/api/client/295/user

test empty > OK reussi response 500 internal server error
test fail > OK reussi response 500 internal server error
test client n'existe pas > 
test doublon data > OK reussi response 500 internal server error ( $errors throw exeption message de violation)

test correct > NO  reussi response 500 internal server error  > Unable to generate an IRI for \"App\\Entity\\Client\
$normalizer->normalize($user) ne fonctionne pas Manque le 2eme parametre (format)

diagrammes:

========================= Custom controller
3/7 [NO]
api/client/{id}/user/{user_id} | http://127.0.0.1:8000/api/client/295/user/401
securite ROLE CLIENT && $client logge == $client{id]
documentation:

=========================
4/7 [OK]

api/collection/produits | http://127.0.0.1:8000/api/collection/produits

=========================
5/7 [OK]
api/produit/{id} | http://127.0.0.1:8000/api/produit/934

=========================
6/7 
api/client/{id}/users | http://127.0.0.1:8000/api/client/295/users
ok fonctionne juste ajouter message client deleted
[ ] securite ROLE ADMIN

=========================
7/7 
api/client/{id}/users    http://127.0.0.1:8000/api/client/{id}/users  
Errodr Unable to generate an IRI for \"App\\Entity\\Client\

securite avoir le role client et que clien = client{id}
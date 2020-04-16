# ynov-b2-api-orm-partiel
ynov-b2-api/orm_pariel 


## Qu'est-ce qu'un DTO et à quoi sert-il ?
Un DTO est un Data transfert object. Il sert à Personnaliser les données de manière propre; avoir des champs calculés, rajouter des attributs virtuels qui n'existent pas en base de donnée. puis  les envoyer à l'utilisateur sur la démande de ressource.   

## Quelle est la différence entre un listener et un subscriber dans Symfony ?
 Les deux écoutent les évènements. Cependant, le subscriber déclare les évenements qu'il écoute, il ne démande pas à être configuration.  Le listener on le configure pour qu'il écoute des évenements

## Qu'est-ce qu'un JWT ? Pourquoi l'utilise-t-on plutôt que les sessions PHP ?
JWT pour : json web token( jeton d'accès)
- l'avantage avec JWT par rapport aux sessions PHP est qu'on a pas besoin de garder le token (jeton d'accès) dans la base de donnée

## Qu'est-ce que CORS ?
- est un mécanisme qui consiste à ajouter des en-têtes HTTP afin de permettre à un agent utilisateur d'accéder à des ressources d'un serveur situé sur une autre origine que le site courant
- Le CORS permet de prendre en charge des requêtes multi-origines sécurisées et des transferts de données entre des navigateurs et des serveurs web
## Quelle est la différence entre JSON et JSON-LD ?
json pour javascript object notation est un format standart d'affichage des données
le jsonld est le format enrichi de json; il permet de définir des données de manière plus précise pour les machine; 
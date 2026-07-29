⚽ Football Guessr — Backend Symfony (Setup + API Test)
Ce dépôt contient la base du backend du projet Football Guessr, développé avec Symfony 7, Docker, Nginx, PHP-FPM et PostgreSQL.


Le projet est actuellement dans sa phase d’initialisation :

environnement Docker fonctionnel

Symfony opérationnel

base PostgreSQL connectée

entités créées (Game, Round, Guess)

relations Doctrine configurées

migrations appliquées

API de test fonctionnelle


🚀 Fonctionnalités actuelles
À ce stade du projet, les éléments suivants sont en place :

✔️ Environnement Docker complet
PHP-FPM 8.3

Nginx

PostgreSQL

Réseau interne Docker

Volume partagé pour le code Symfony

✔️ Backend Symfony opérationnel
Symfony 7.4

PHP 8.3

Doctrine ORM

Migrations fonctionnelles

Connexion à PostgreSQL validée

✔️ Entités créées
Game

Round

Guess  
Avec relations :

Game → Round (OneToMany)

Round → Game (ManyToOne)

Round → Guess (OneToOne)

Guess → Round (OneToOne)

✔️ API de test
Une route simple pour vérifier que Symfony répond :

Code
GET /api/ping
Réponse :

json
{"status": "ok"}


🧱 Architecture du projet
Code
symfony/
 ├── docker/
 │    ├── php/        → PHP-FPM 8.3
 │    ├── nginx/      → Serveur HTTP
 │    └── db/         → PostgreSQL 15
 ├── src/
 │    ├── Controller/ → ApiTestController
 │    ├── Entity/     → Game, Round, Guess
 │    └── Repository/
 ├── migrations/      → Migrations Doctrine
 ├── config/          → Configuration Symfony
 └── docker-compose.yml

 
🐳 Docker
Lancer le projet
Code
docker-compose up -d --build
Entrer dans le conteneur PHP
Code
docker exec -it guessr-php bash


🗄️ Base de données
Vérifier la connexion
Code
php bin/console doctrine:query:sql "SELECT 1;"
Vérifier les tables
Code
php bin/console doctrine:query:sql "SELECT * FROM game;"
php bin/console doctrine:query:sql "SELECT * FROM round;"
php bin/console doctrine:query:sql "SELECT * FROM guess;"


🔥 API disponible
1. API de test
Permet de vérifier que Symfony répond correctement.

Code
GET /api/ping
Réponse :

json
{"status": "ok"}
🛠️ Technologies utilisées
Symfony 7.4

PHP 8.3

Docker / Docker Compose

Nginx

PostgreSQL

Doctrine ORM

WSL2


📌 Prochaines étapes
Implémentation des vraies API Football Guessr :

/api/game/start

/api/game/{id}/next-round

/api/game/{id}/guess

/api/game/{id}/score

Ajout d’une base de données de joueurs

Intégration du scoring

Connexion au front-end


👤 Auteur
Bernard Kabou  
Projet Football Guessr — 2026

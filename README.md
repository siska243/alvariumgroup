# Projet Crud Offre d'Emploi avec Symfony
Ce projet est une application web de gestion d'offres d'emploi développée avec le framework Symfony.

## Prérequis
Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre système :
- PHP version 7.4 ou supérieure
  
```bash
# Version du php
php -v
```
- Composer (outil de gestion des dépendances PHP)
```bash
# Version du composer
composer --version
```
- Symfony CLI (Command Line Interface)
```bash
# Version du symfony
symfony -V
```
## Utilisation du Makefile
Ce projet utilise un Makefile pour simplifier certaines tâches courantes. Voici quelques commandes disponibles :
```bash
# pour la creation de la base de données :
make sf-dc
# pour vérifier les exigences:
make sf-check-requirements
# pour installer les dependances du projet avec yarn:
make d-i-y
# pour lancer le serveur avec symfony CLI:
make sf-d-y

# Pour voir toutes les commandes :
make help
```

## Installation
1. Cloner le dépôt :

```bash
git clone https://github.com/siska243/alvariumgroup.git
```
2. Accéder au répertoire du projet :
```bash
cd alvariumgroup
```
3. Installation de dependeces du projet
```bash
# install all dependencies avec yarn
make d-i-y
ou
# install all dependencies avec npm
make d-i-n
```
4. Configurer la base de données : 

Assurez-vous que les extensions PHP php-pgsql et php-pdo_pgsql sont installées sur votre système avant de continuer. Voici comment vérifier leur installation :
```bash
php -m | grep pgsql
# Si vous obtenez une sortie similaire à pgsql, cela signifie que l'extension est installée.
php -m | grep pdo_pgsql
# Si vous obtenez une sortie similaire à pdo_pgsql, cela signifie que l'extension est installée.
```
Si l'une ou les deux extensions ne sont pas installées, vous devrez les installer avant de pouvoir utiliser la base de données PostgreSQL avec Symfony.

5. Créer la base de données :
Modifier le fichier .env avec les informations de votre base de données :

```bash
# remplace par votre username postgresl et le password par votre password postgresql
DATABASE_URL="postgresql://user:password@127.0.0.1:5432/alvariumgroup?serverVersion=15&charset=utf8"
# executer la commande
make sf-dc
```
6. Exécuter les migrations :
 ```bash 
 # make migration
 make sf-mm
 # doctrine migrationsmigration
 make sf-dmm
 ```
7. Charger les données de démo (facultatif) :
```bash 
 make sf-fixtures
 ```
8. Lancer le serveur de développement :
```bash 
# launch symfony serve background tasks and yarn watch.
 make sf-d-y 
 make sf-d-n
 # launch symfony serve background tasks and npm watch
 
 ou vous pouvez le lancer séparément
 # pour le serveur symfony
 make sf-start-d
 # yarn 
 make y-watch
 # npm 
 make npm
 ```
10. Accéder à l'application dans votre navigateur à l'adresse suivante :
[https://127.0.0.1:8080](https://127.0.0.1:8080)
11.  Créer un utilisateur par défaut :
username : user
password :Azerty123@@
default user
[https://127.0.0.1:8080/_default-user-account](https://127.0.0.1:8080/_default-user-account)


## Auteurs
[Emmanuel SIMISI](https://github.com/siska243)

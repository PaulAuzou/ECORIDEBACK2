# ECORIDE

Cette application Symfony est conçue pour gérer la partie back de la plateforme de covoiturage ECORIDE,

## Prérequis

Avant de lancer ce projet, assurez-vous que les éléments suivants sont installés sur votre machine :

- **PHP** (version 7.2 ou supérieure)
- **Composer**
- **SQLite** (Base de données utilisée ici)
- **Serveur Web** (Apache, Nginx, Symfony server, etc.)

## Installation

1. Clonez le projet depuis le répertoire Git :

   ```bash
   git clone https://github.com/votre-utilisateur/votre-projet.git
   ```

2. Rendez-vous dans le dossier du projet :

   ```bash
   cd votre-projet
   ```

3. Installez les dépendances avec Composer :

   ```bash
   composer install
   ```

4. Configurez les variables d'environnement. Copiez le fichier `.env` :

   ```bash
   cp .env .env.local
   ```

   Puis, modifiez le fichier `.env.local` pour configurer les paramètres locaux (par exemple, la base de données utilisée).

5. Créez et initialisez la base de données SQLite :

   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

6. (Optionnel) Chargez des données fictives pour tester l'application :

   ```bash
   php bin/console doctrine:fixtures:load
   ```

## Lancer le Serveur de Développement

Pour lancer le serveur interne de Symfony, exécutez la commande suivante :

```bash
symfony server:start
```

Accédez ensuite à l'application dans le navigateur via [http://localhost:8000](http://localhost:8000).

## Structure du Projet

- `src/` : Contient le code source principal (contrôleurs, services, entités, etc.).
- `templates/` : Contient les templates Twig pour le rendu des vues.
- `config/` : Contient les fichiers de configuration.
- `migrations/` : Contient les scripts de migration pour la base de données.
- `public/` : Contient les fichiers publics (front-end, assets, point d'entrée `index.php`).

## Commandes Utiles

Voici quelques commandes Symfony courantes :

- Lancer le serveur de développement :
  ```bash
  symfony server:start
  ```

- Exécuter les tests unitaires :
  ```bash
  ./vendor/bin/phpunit
  ```

- Effectuer des migrations :
  ```bash
  php bin/console doctrine:migrations:migrate
  ```

- Vérifier les routes configurées :
  ```bash
  php bin/console debug:router
  ```

## Tests

Les tests unitaires utilisent PHPUnit. Pour exécuter les tests :

```bash
./vendor/bin/phpunit
```

Assurez-vous que les tests passent avant tout déploiement.

## Contribuer


1. Forkez le projet.
2. Créez une branche pour votre feature : `git checkout -b ma-feature`.
3. Commitez vos modifications : `git commit -m "Ajoute ma-feature"`.
4. Poussez vers la branche : `git push origin ma-feature`.
5. Créez une pull request.

## License

Ce projet est sous licence [ECORIDE] - voir le fichier LICENSE pour plus de détails.

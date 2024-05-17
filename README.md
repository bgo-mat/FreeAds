# Free Ads - Site de Petites Annonces sur Laravel

Ce dépôt contient le travail réalisé au cours d'une semaine dans le cadre du projet **Free Ads**, un site de petites annonces utilisant le framework Laravel.

## Description du Projet

Ce projet a pour objectif de créer un site de petites annonces en utilisant Laravel, un framework MVC (Modèle-Vue-Contrôleur) populaire pour le développement web en PHP.

### Jour 01: Installation et Page d'Accueil

- **Objectifs**:
  - Installation de Laravel.
  - Mise en place de la page d'accueil.

- **Étapes**:
  1. Installer Laravel ([Documentation Laravel](https://laravel.com/docs/8.x/installation)).
  2. Créer une nouvelle application nommée "freeads".
  3. Lancer le serveur de développement avec `artisan` et vérifier l'installation.
  4. Créer une vue `index.php` pour la page d'accueil.
  5. Créer un contrôleur `IndexController` avec une méthode `showIndex`.
  6. Configurer la route pour accéder à la page d'accueil.

### Jour 02: Inscription, Connexion et Profil Utilisateur

- **Objectifs**:
  - Page d'inscription et de connexion.
  - Page de modification de profil.

- **Étapes**:
  1. Créer une ressource `Utilisateur` avec `artisan`.
  2. Créer un formulaire d'inscription avec envoi de mail de confirmation.
  3. Créer un formulaire de connexion (Voir la documentation sur l'authentification).
  4. Implémenter un CRUD pour modifier les informations utilisateurs (email, mot de passe, etc.).
  5. Tester les fonctionnalités.

### Jour 03: Gestion des Annonces

- **Objectifs**:
  - Création et gestion des annonces.
  - Affichage de la liste des annonces.

- **Étapes**:
  1. Créer le modèle `Annonce` et son contrôleur.
  2. Créer le formulaire de création d'annonce.
  3. Créer une page listant toutes les annonces.
  4. Permettre la modification et la suppression des annonces par leurs propriétaires.
  5. Ajouter la possibilité d'ajouter plusieurs photographies par annonce.
  6. Tester les fonctionnalités.

### Jour 04: Recherche et Filtrage des Annonces

- **Objectifs**:
  - Système de recherche d'annonces avec filtres.
  - Système de propositions d'annonces par matching.

- **Étapes**:
  1. Compléter les ressources `Annonces` et `Utilisateurs` pour ajouter :
     - La recherche d'annonces.
     - Le filtrage d'annonces par critères (nom, type de produit, prix, etc.).
     - La liste des annonces publiées.
     - La liste des annonces les plus récentes.
     - La liste des annonces les plus intéressantes (matching).
  2. Tester les fonctionnalités.

### Jour 05: Messagerie et Débogage

- **Objectifs**:
  - Système de messagerie entre utilisateurs.
  - Tests et débogage final.

- **Étapes**:
  1. Créer la ressource `Message`.
  2. Créer une page d'envoi et une page de réception des messages.
  3. Indiquer le nombre de nouveaux messages reçus dans le menu.
  4. Effectuer des tests et déboguer les fonctionnalités.

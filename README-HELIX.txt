 Système d'Authentification avec Laravel

Ce projet est une implémentation d'un système d'authentification sécurisé basé sur Laravel, mais pour ajouter une touche personnelle , j’ai créé un middleware pour limiter les tentatives de connexions
 Fonctionnalités
 Interface de Connexion
Une page de connexion avec des champs pour le nom d'utilisateur et le mot de passe
Un bouton pour soumettre le formulaire de connexion
Des messages d'erreur pour les entrées invalides ou les tentatives échouées
Gestion des Sessions
Utilisation du système de session Laravel pour suivre les utilisateurs connectés
Redirection vers une page protégée après une connexion réussie
Déconnexion automatique après fermeture de session
Validation de l'Utilisateur
Vérification des informations d'identification de l'utilisateur dans la base de données
Validation des entrées utilisateur pour éviter les attaques SQL Injection
 Stockage Sécurisé des Mots de Passe
Hachage des mots de passe avec bcrypt
Aucun mot de passe stocké en clair
 Sécurisation des Tentatives de Connexion
Middleware personnalisé : CheckAttempt
Mise en cache des tentatives échouées
Blocage temporaire et message d'avertissement après 5 tentatives échouées
Personnalisation des routes pour qu’elles soient adapter au nouveau middleware
 Installation
Cloner le projet
git clone https://github.com/ton-projet.git
cd ton-projet
Installer les dépendances

composer install
npm install
Lancer les migrations
php artisan migrate
Démarrer le serveur
php artisan serve et démarrer aussi npm run dev  pour bootstrao


Utilisation
Accéder à l'URL : http://127.0.0.1:8000/login
Se connecter avec un compte existant ou en créer un (il y une pae d’inscription ou le login test@gmail.com/test1234)
Après 5 échecs, un message d'avertissement est affiché




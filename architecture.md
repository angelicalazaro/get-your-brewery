/MyFavBreweries
│
├── config/
│   ├── config.php          # Variables globales (baseEndpoint, etc.)
│   ├── connect_db.php      # Connexion PDO à MySQL
│   └── apiConnect.php      # Fonction getApi() pour appeler l’API externe
│
├── public/                 # Tout ce que l’utilisateur voit
│   ├── index.php           # Page d’accueil : liste + filtres (pays, type)
│   ├── login.php           # Formulaire connexion
│   ├── register.php        # Formulaire inscription
│   ├── profile.php         # Modifier profil utilisateur
│   ├── favorites.php       # Brasseries favorites
│   ├── add_brewery.php     # Formulaire ajout brasserie (uniquement user connecté)
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── app.js (optionnel)
│
├── src/
│   ├── breweries.php       # Fonctions CRUD liées à la table breweries
│   ├── users.php           # Fonctions CRUD liées aux utilisateurs
│   └── auth.php            # Fonctions login/logout, sessions, cookies
│
└── import.php              # Script pour remplir la table breweries depuis
API

Total Breweries: 8,355

TABLES

BREWERY
id
name
by_type
city
website_url
state
country

USER
id
name
password

FAVORITES
id
name
user_id 9 (cles etrangere)
breweries_id (cles etrangere)
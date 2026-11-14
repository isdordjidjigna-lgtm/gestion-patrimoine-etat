# Gestion du Patrimoine de l'État

![Laravel](https://img.shields.io/badge/Laravel-12.x-red?logo=laravel)
![Docker](https://img.shields.io/badge/Docker-Compose-blue?logo=docker)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-16-blue?logo=postgresql)
![Nginx](https://img.shields.io/badge/Nginx-Gateway-green?logo=nginx)

> Solution numérique de gestion du patrimoine de l'État (République Togolaise) basée sur une architecture microservices.

---

## Description

Cette application permet de :
- Recenser les biens mobiliers et immobiliers de l'État.
- Suivre l'état des biens (conforme, dégradé, à vérifier).
- Gérer les affectations et transferts entre ministères.
- Produire des rapports et des exports (CSV).
- Sécuriser l'accès avec une authentification.

---

## Architecture

L'application repose sur une architecture microservices orchestrée par Docker Compose.

**Services disponibles :**

| Service | Rôle | Techno |
|---|---|---|
| auth-service | Authentification et interface utilisateur | Laravel 12 |
| patrimoine-service | API des biens et catégories | Laravel 12 |
| occupation-service | Gestion des affectations | Laravel 12 |
| reporting-service | Génération de rapports | Laravel 12 |
| gateway | Passerelle API (Nginx) | Nginx Alpine |
| postgres | Bases de données | PostgreSQL 16 |

---

## Stack Technique

- Backend : Laravel 12 (PHP 8.3)
- Frontend : Blade + Tailwind CSS
- Base de données : PostgreSQL 16
- Conteneurisation : Docker + Docker Compose
- Gateway : Nginx
- Auth : Laravel Breeze / Sessions

---

## Prérequis

- Docker Desktop (Windows/Mac) ou Docker + Docker Compose (Linux)
- Git

---

## Installation

### 1. Cloner le projet

git clone https://github.com/isdordjidjigna-lgtm/gestion-patrimoine-etat.git
cd gestion-patrimoine-etat

### 2. Lancer les conteneurs

docker compose up -d --build

Premier lancement : 5 à 10 minutes (téléchargement des images et build).

### 3. Accéder à l'application

Ouvrir le navigateur sur :

http://localhost:8001/login

### 4. Comptes de test

| Email | Mot de passe | Rôle |
|---|---|---|
| admin@gouv.tg | password | Administrateur |

---

## Documentation API

### Endpoints disponibles

| Méthode | URL | Description |
|---|---|---|
| GET | /api/patrimoine/biens | Liste tous les biens |
| GET | /api/patrimoine/biens/{id} | Détail d'un bien |
| POST | /api/patrimoine/biens | Créer un bien |
| PUT | /api/patrimoine/biens/{id} | Modifier un bien |
| DELETE | /api/patrimoine/biens/{id} | Supprimer un bien |
| GET | /api/patrimoine/categories | Liste des catégories |
| GET | /api/patrimoine/mouvements | Liste des mouvements |

### Exemple de test avec curl

curl http://localhost:8000/api/patrimoine/biens

---

## Modèle de données

### Table biens

| Colonne | Type | Description |
|---|---|---|
| id | bigint | Identifiant |
| reference | string | Référence unique (PAT-XXX-XXXX) |
| designation | string | Nom du bien |
| categorie_id | bigint | Catégorie (FK) |
| localisation_id | bigint | Localisation (FK) |
| valeur | decimal | Valeur en FCFA |
| statut | enum | conforme, degrade, a_verifier, reforme |

### Table categories

| Colonne | Type |
|---|---|
| id | bigint |
| code | string |
| nom | string |

### Table mouvements

| Colonne | Type |
|---|---|
| id | bigint |
| bien_id | bigint |
| type | enum (affectation, transfert, ...) |
| entite_destinataire | string |
| statut | enum |
| date_mouvement | date |

---

## Structure du projet

gestion-patrimoine-etat/
├── docker-compose.yml
├── README.md
├── docs/
│   ├── screenshots/
│   ├── uml/
│   ├── figma.md
│   └── proposition-financiere.pdf
├── gateway/
│   └── nginx.conf
└── services/
    ├── auth-service/
    ├── patrimoine-service/
    ├── occupation-service/
    └── reporting-service/

---

## Tests

Tester l'API :
curl http://localhost:8000/api/patrimoine/biens

Tester la gateway :
curl http://localhost:8081/health

---

## Auteur

Komlan Isidore DJIDJIGNAN
- GitHub : https://github.com/isdordjidjigna-lgtm

---

## Licence

Projet académique - Brief de formation 2026.
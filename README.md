# Decoupled Drupal-Symfony-Vue Project

This project is a decoupled application architecture that uses Drupal as a headless CMS, Symfony as a middleware REST API, and Vue.js as the frontend.

## Architecture Overview

1.  **Backend (Drupal 10)**: Serves as the Content Management System. It stores content types like "Products" and "Football Clubs" and exposes them via API.
2.  **Middleware (Symfony 8.2)**: Acts as a bridge between the frontend and Drupal. It fetches data from Drupal, processes it if necessary, and provides a clean REST API for the frontend with localization support.
3.  **Frontend (Vue 3)**: A modern reactive UI built with Vue, Vite, and Tailwind CSS. It consumes the Symfony API to display content.

## Prerequisites

-   Docker and Docker Compose
-   Git

## Getting Started

### 1. Clone the repository
```bash
git clone https://github.com/zarkog1993/rest_api_project
cd rest_api
```

### 2. Start the application
Use Docker Compose to build and start all services:
```bash
docker-compose up -d
```

This will start the following services:
-   **Frontend**: http://localhost:5173
-   **Symfony API**: http://localhost:8082
-   **Drupal**: http://localhost:8081
-   **MySQL**: http://localhost:3306
-   **Redis**: http://localhost:6380

### 3. Initialize Services

#### Symfony
The dependencies are managed via the `composer` service in Docker.
```bash
docker-compose run --rm composer install
```

#### Frontend
Dependencies are automatically installed and the dev server is started when the container runs (see `docker-compose.yml`).

## API Endpoints (Symfony)

The Symfony middleware provides the following localized endpoints:

-   `GET /{locale}/products`: Fetches products from Drupal.
-   `GET /{locale}/football/club`: Fetches football clubs from Drupal.

Supported locales: `en`, `sr`.

## Development

-   **Frontend**: Located in `/frontend`. Uses Vue 3, Vite, and Tailwind CSS.
-   **Symfony**: Located in `/symfony`. Business logic for API aggregation is in `src/Service/DrupalApiClient.php`.
-   **Drupal**: Located in `/drupal`. Configuration and content are managed here.

## Environment Variables

Key configurations can be found in `docker-compose.yml`:
-   `VITE_API_URL`: Points to the Symfony API.
-   `DATABASE_URL`: Connection string for the Symfony database.
-   `DRUPAL_DB_*`: Database credentials for Drupal.

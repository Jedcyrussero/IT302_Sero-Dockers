# Docker Compose Self-Contained Web Development Template

A complete web development environment using Docker Compose with the following services:

| Service | Description | Port |
|---------|-------------|------|
| Nginx | Web Server | 80, 443 |
| PHP 8.2 | Devilbox PHP-FPM (all extensions) | — |
| MySQL 8.0 | Database | 3306 |
| phpMyAdmin | Database Management | 8080 |
| Workspace | Dev environment (Git, Composer, Node, npm) | — |
| Redis | Cache | 6379 |
| Mailhog | Email Testing (SMTP + UI) | 1025 (SMTP), 8025 (UI) |

## Prerequisites

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) installed and running

## Project Structure

```
docker/
├── docker-compose.yml   # Main compose configuration
├── .env                 # Environment variables
├── README.md
├── app/                 # Web application source code
│   └── index.php
├── nginx/               # Nginx configuration
│   └── default.conf
├── php/                 # PHP configuration
│   └── php.ini
├── mysql/               # MySQL configuration
│   └── my.cnf
├── workspace/           # Workspace Dockerfile
│   └── Dockerfile
└── redis/               # Redis configuration
    └── redis.conf
```

## Getting Started

1. Start all services:

   ```bash
   docker-compose up -d --build
   ```

2. Access the application:

   - **Web App:** http://localhost
   - **phpMyAdmin:** http://localhost:8080 (user: `root`, password: `root`)
   - **Mailhog UI:** http://localhost:8025

3. Enter the workspace container:

   ```bash
   docker exec -it app-workspace bash
   ```

4. Stop all services:

   ```bash
   docker-compose down
   ```

5. Remove volumes (reset database and cache):

   ```bash
   docker-compose down -v
   ```

## Environment Variables

Edit `.env` to customize MySQL and phpMyAdmin settings.

## Health Checks

All critical services include health checks. Use `docker ps` to verify all services are healthy before use.

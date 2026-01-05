# Spotify Assist

Eine moderne PHP-Webanwendung zur Verwaltung und Analyse von Spotify-Inhalten.

## Technologien

- **PHP 8.5**
- **Symfony Components** (Console, HTTP Foundation, Routing)
- **Doctrine DBAL** (Datenbankzugriff)
- **Twig** (Template Engine)
- **Tailwind CSS** (Frontend Framework)
- **Spotify Web API** (PHP Library)
- **PHPUnit** (Testing)
- **PHPStan** (Static Analysis)

## Projektstruktur

```
spotifyAssist/
├── .claude/                    # Claude Code Konfiguration
│   ├── settings.json          # Projekt-Einstellungen
│   ├── instructions.md        # Entwicklungs-Richtlinien
│   ├── mcp.json              # MCP Server Config
│   └── skills/               # Custom Skills
├── assets/                    # Source Assets
│   ├── css/                  # CSS-Quellen
│   └── js/                   # JavaScript-Quellen
├── config/                    # Konfigurationsdateien
│   ├── app.php               # App-Konfiguration
│   ├── database.php          # Datenbank-Konfiguration
│   └── routes.php            # Routing-Definitionen
├── docker/                    # Docker-Konfiguration
│   ├── nginx/                # Nginx-Configs
│   └── php/                  # PHP-Configs
├── public/                    # Web-Root
│   ├── index.php             # Einstiegspunkt
│   ├── css/                  # Generierte CSS
│   └── js/                   # Generierte JS
├── src/                       # Anwendungscode
│   ├── Controller/           # Controller
│   ├── Service/              # Business Logic
│   ├── Repository/           # Daten-Repositories
│   ├── Entity/               # Daten-Entitäten
│   ├── Middleware/           # Middleware
│   └── Application.php       # Haupt-Application-Klasse
├── templates/                 # Twig-Templates
│   ├── layouts/              # Layout-Templates
│   ├── components/           # Wiederverwendbare Komponenten
│   ├── pages/                # Seiten-Templates
│   └── error/                # Fehler-Seiten
├── tests/                     # Tests
│   ├── Unit/                 # Unit-Tests
│   └── Integration/          # Integrations-Tests
├── var/                       # Variable Dateien
│   ├── cache/                # Cache
│   └── log/                  # Logs
├── vendor/                    # Composer-Abhängigkeiten
├── composer.json             # PHP-Abhängigkeiten
├── package.json              # Node.js-Abhängigkeiten
├── Dockerfile                # Docker-Image-Definition
├── docker-compose.yml        # Docker-Services
└── .env                      # Umgebungsvariablen
```

## Installation

### Mit Docker (empfohlen)

1. **Repository klonen**
   ```bash
   git clone <repository-url>
   cd spotifyAssist
   ```

2. **Umgebungsvariablen einrichten**
   ```bash
   cp .env.example .env
   # .env bearbeiten und Spotify API-Credentials eintragen
   ```

3. **Docker-Container starten**
   ```bash
   docker-compose up -d
   ```

4. **Abhängigkeiten installieren**
   ```bash
   docker-compose exec php composer install
   ```

5. **Anwendung öffnen**
   - Anwendung: http://localhost:8080
   - PHPMyAdmin: http://localhost:8081

### Lokal (ohne Docker)

1. **Voraussetzungen**
   - PHP 8.5+
   - Composer
   - Node.js 20+
   - MySQL 8.0+

2. **Abhängigkeiten installieren**
   ```bash
   composer install
   npm install
   ```

3. **Tailwind CSS kompilieren**
   ```bash
   npm run build
   # Oder im Watch-Mode für Development:
   npm run dev
   ```

4. **Webserver starten**
   ```bash
   php -S localhost:8080 -t public/
   ```

## Entwicklung

### Nützliche Befehle

```bash
# Tests ausführen
composer test
# oder
./vendor/bin/phpunit

# Static Analysis
composer analyse
# oder
./vendor/bin/phpstan analyse

# Beide Checks
composer check

# Tailwind CSS Watch Mode
npm run dev

# Tailwind CSS Production Build
npm run build
```

### Mit Docker

```bash
# PHP-Container betreten
docker-compose exec php sh

# Tests ausführen
docker-compose exec php composer test

# Static Analysis
docker-compose exec php composer analyse

# Logs ansehen
docker-compose logs -f
```

## Spotify API Setup

1. Gehe zu [Spotify Developer Dashboard](https://developer.spotify.com/dashboard)
2. Erstelle eine neue App
3. Notiere Client ID und Client Secret
4. Füge `http://localhost:8080/spotify/callback` als Redirect URI hinzu
5. Trage die Credentials in `.env` ein

## Code-Style

Das Projekt folgt **PSR-12** Coding Standards.

## Lizenz

MIT

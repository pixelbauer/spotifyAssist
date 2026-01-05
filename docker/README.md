# Docker Development Environment

## Services

- **nginx** - Webserver (Port 8080)
- **php** - PHP 8.5 FPM mit Xdebug
- **node** - Node.js für Tailwind CSS (Watch Mode)
- **mysql** - MySQL 8.0 Datenbank (Port 3306)
- **phpmyadmin** - Datenbank-Verwaltung (Port 8081)

## Erste Schritte

### 1. Container starten
```bash
docker-compose up -d
```

### 2. Abhängigkeiten installieren
```bash
# PHP-Abhängigkeiten
docker-compose exec php composer install

# Node.js-Abhängigkeiten (werden automatisch installiert)
# Falls manuell nötig:
docker-compose exec node npm install
```

### 3. Anwendung aufrufen
- **Anwendung**: http://localhost:8080
- **PHPMyAdmin**: http://localhost:8081

## Nützliche Befehle

### Container-Verwaltung
```bash
# Container starten
docker-compose up -d

# Container stoppen
docker-compose down

# Container neu bauen
docker-compose build

# Logs anzeigen
docker-compose logs -f

# Bestimmten Service-Log
docker-compose logs -f php
```

### PHP-Befehle ausführen
```bash
# Composer
docker-compose exec php composer install
docker-compose exec php composer update

# PHPUnit Tests
docker-compose exec php ./vendor/bin/phpunit

# PHPStan Analyse
docker-compose exec php ./vendor/bin/phpstan analyse

# PHP CLI
docker-compose exec php php artisan
```

### Node.js-Befehle
```bash
# NPM-Befehle ausführen
docker-compose exec node npm install
docker-compose exec node npm run build

# Tailwind neu starten (falls Watch hängt)
docker-compose restart node
```

### Datenbank
```bash
# MySQL-Shell öffnen
docker-compose exec mysql mysql -uroot -proot spotifyassist

# Datenbank-Backup erstellen
docker-compose exec mysql mysqldump -uroot -proot spotifyassist > backup.sql

# Datenbank-Backup wiederherstellen
docker-compose exec -T mysql mysql -uroot -proot spotifyassist < backup.sql
```

## Live-Reload Features

### ✅ Automatische Aktualisierung bei:
- PHP-Datei-Änderungen (OPcache deaktiviert)
- Twig-Template-Änderungen
- Tailwind CSS-Änderungen (Watch Mode)
- JavaScript/CSS-Änderungen

### Volume-Mounts
Alle Code-Änderungen werden sofort in die Container synchronisiert:
- Haupt-Verzeichnis → `/var/www/html`
- Nginx-Konfiguration → `/etc/nginx/conf.d/`
- PHP-Konfiguration → `/usr/local/etc/php/conf.d/`

## Debugging

### Xdebug
Xdebug ist vorkonfiguriert und läuft auf Port 9003.

**PHPStorm Setup:**
1. Settings → PHP → Servers
2. Name: `DockerApp`
3. Host: `localhost`, Port: `8080`
4. Debugger: Xdebug
5. Path Mappings: Projekt-Root → `/var/www/html`

## Umgebungsvariablen

Erstelle eine `.env` Datei für lokale Konfiguration:

```env
# Datenbank
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=spotifyassist
DB_USERNAME=app
DB_PASSWORD=app

# App
APP_ENV=development
APP_DEBUG=true
```

## Troubleshooting

### Port bereits in Verwendung
```bash
# Ports in docker-compose.yml anpassen
ports:
  - "8090:80"  # statt 8080
```

### Berechtigungsprobleme
```bash
# Dateiberechtigungen anpassen
docker-compose exec php chown -R www-data:www-data /var/www/html
```

### Container neu bauen
```bash
docker-compose down -v
docker-compose build --no-cache
docker-compose up -d
```

### Tailwind CSS wird nicht kompiliert
```bash
# Node-Container neu starten
docker-compose restart node

# Logs prüfen
docker-compose logs node
```

# Projekt-Anweisungen für Claude Code

## Projektübersicht
Dies ist ein PHP-Projekt, das moderne Best Practices und Symfony-Komponenten verwendet.

## Technologie-Stack
- **Sprache**: PHP
- **Style Guide**: PSR-12
- **Frameworks**:
  - Symfony Components
  - Doctrine DBAL
  - Twig (Template Engine)
  - Tailwind CSS (Frontend)
  - Saloon PHP (API Client)
- **Testing**: PHPUnit
- **Static Analysis**: PHPStan

## Entwicklungs-Richtlinien

### Code-Style
- Halte dich strikt an PSR-12 Coding Standards
- Verwende Type Hints für alle Methoden und Eigenschaften
- Schreibe aussagekräftige DocBlocks für Klassen und öffentliche Methoden

### Testing
- Schreibe Unit-Tests für alle neuen Features mit PHPUnit
- Führe Tests aus mit: `./vendor/bin/phpunit`
- Stelle sicher, dass alle Tests grün sind vor dem Commit

### Static Analysis
- Führe PHPStan aus vor jedem Commit: `./vendor/bin/phpstan analyse`
- Behebe alle gemeldeten Fehler und Warnungen

### Git Workflow
- Verwende Feature-Branches für neue Features
- Branch-Namensschema: `feature/beschreibung` oder `bugfix/beschreibung`
- Erstelle Pull Requests für Code Reviews
- Merge nur nach erfolgreicher Code Review und grünen Tests

### Kommunikation
- Alle Antworten und Commit-Messages auf Deutsch
- Code-Kommentare auf Deutsch
- Dokumentation auf Deutsch

## Nützliche Befehle
```bash
# Tests ausführen
./vendor/bin/phpunit

# PHPStan ausführen
./vendor/bin/phpstan analyse

# Code-Style prüfen (falls PHP CS Fixer installiert)
./vendor/bin/php-cs-fixer fix --dry-run --diff

# Code-Style automatisch korrigieren
./vendor/bin/php-cs-fixer fix
```

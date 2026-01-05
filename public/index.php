<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Application;
use Symfony\Component\HttpFoundation\Request;

// Fehlerbehandlung für Development
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Umgebungsvariablen laden
if (file_exists(__DIR__ . '/../.env')) {
    $lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        putenv($line);
    }
}

// Request erstellen
$request = Request::createFromGlobals();

// Application initialisieren und ausführen
$app = new Application();
$response = $app->handle($request);

// Response senden
$response->send();

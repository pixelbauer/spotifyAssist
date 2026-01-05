<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

// Testumgebung initialisieren
putenv('APP_ENV=test');
putenv('APP_DEBUG=true');

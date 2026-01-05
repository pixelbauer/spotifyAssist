<?php

declare(strict_types=1);

return [
    'driver' => getenv('DB_DRIVER') ?: 'pdo_mysql',
    'host' => getenv('DB_HOST') ?: 'mysql',
    'port' => getenv('DB_PORT') ?: '3306',
    'dbname' => getenv('DB_DATABASE') ?: 'spotifyassist',
    'user' => getenv('DB_USERNAME') ?: 'app',
    'password' => getenv('DB_PASSWORD') ?: 'app',
    'charset' => 'utf8mb4',
];

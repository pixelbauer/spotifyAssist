<?php

declare(strict_types=1);

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use App\Controller\HomeController;
use App\Controller\SpotifyController;

$routes = new RouteCollection();

// Home Routes
$routes->add('home', new Route('/', [
    '_controller' => HomeController::class . '::index',
]));

$routes->add('about', new Route('/about', [
    '_controller' => HomeController::class . '::about',
]));

// Spotify Routes
$routes->add('spotify.search', new Route('/spotify/search', [
    '_controller' => SpotifyController::class . '::search',
]));

$routes->add('spotify.callback', new Route('/spotify/callback', [
    '_controller' => SpotifyController::class . '::callback',
]));

return $routes;

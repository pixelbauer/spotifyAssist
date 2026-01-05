<?php

declare(strict_types=1);

namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Application
{
    private RouteCollection $routes;
    private Environment $twig;

    public function __construct()
    {
        $this->initializeRoutes();
        $this->initializeTwig();
    }

    private function initializeRoutes(): void
    {
        $this->routes = require __DIR__ . '/../config/routes.php';
    }

    private function initializeTwig(): void
    {
        $loader = new FilesystemLoader(__DIR__ . '/../templates');
        $this->twig = new Environment($loader, [
            'cache' => __DIR__ . '/../var/cache/twig',
            'debug' => getenv('APP_DEBUG') === 'true',
            'auto_reload' => true,
        ]);
    }

    public function handle(Request $request): Response
    {
        try {
            $context = new RequestContext();
            $context->fromRequest($request);

            $matcher = new UrlMatcher($this->routes, $context);
            $parameters = $matcher->match($request->getPathInfo());

            $controller = $parameters['_controller'];
            unset($parameters['_controller'], $parameters['_route']);

            if (is_string($controller) && str_contains($controller, '::')) {
                [$class, $method] = explode('::', $controller);
                $controllerInstance = new $class($this->twig);
                return $controllerInstance->$method($request, $parameters);
            }

            return new Response('Controller nicht gefunden', Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (ResourceNotFoundException $e) {
            return new Response(
                $this->twig->render('error/404.html.twig'),
                Response::HTTP_NOT_FOUND
            );
        } catch (\Exception $e) {
            return new Response(
                $this->twig->render('error/500.html.twig', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ]),
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}

<?php

declare(strict_types=1);

namespace App\Tests\Unit\Controller;

use PHPUnit\Framework\TestCase;
use App\Controller\HomeController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

class HomeControllerTest extends TestCase
{
    private HomeController $controller;
    private Environment $twig;

    protected function setUp(): void
    {
        $loader = new ArrayLoader([
            'pages/home.html.twig' => 'Home Page: {{ title }} - {{ message }}',
            'pages/about.html.twig' => 'About Page: {{ title }}',
        ]);

        $this->twig = new Environment($loader);
        $this->controller = new HomeController($this->twig);
    }

    public function testIndexReturnsResponse(): void
    {
        $request = new Request();
        $response = $this->controller->index($request, []);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }

    public function testAboutReturnsResponse(): void
    {
        $request = new Request();
        $response = $this->controller->about($request, []);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }
}

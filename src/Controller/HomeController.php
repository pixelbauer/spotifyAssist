<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    public function index(Request $request, array $params): Response
    {
        return $this->render('pages/home.html.twig', [
            'title' => 'Spotify Assist',
            'message' => 'Willkommen bei Spotify Assist!',
        ]);
    }

    public function about(Request $request, array $params): Response
    {
        return $this->render('pages/about.html.twig', [
            'title' => 'Über uns',
        ]);
    }
}

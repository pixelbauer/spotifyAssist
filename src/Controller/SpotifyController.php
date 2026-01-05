<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

class SpotifyController extends AbstractController
{
    private Session $session;
    private SpotifyWebAPI $api;

    public function __construct($twig)
    {
        parent::__construct($twig);

        $this->session = new Session(
            getenv('SPOTIFY_CLIENT_ID') ?: '',
            getenv('SPOTIFY_CLIENT_SECRET') ?: '',
            getenv('SPOTIFY_REDIRECT_URI') ?: ''
        );

        $this->api = new SpotifyWebAPI();
    }

    public function search(Request $request, array $params): Response
    {
        $query = $request->query->get('q', '');

        if (empty($query)) {
            return $this->render('pages/spotify/search.html.twig', [
                'title' => 'Spotify Suche',
                'results' => null,
            ]);
        }

        // Hier würde die echte Spotify API-Suche stattfinden
        // Für die Basis-Struktur erstmal ein Platzhalter

        return $this->render('pages/spotify/search.html.twig', [
            'title' => 'Spotify Suche',
            'query' => $query,
            'results' => [],
        ]);
    }

    public function callback(Request $request, array $params): Response
    {
        $code = $request->query->get('code');

        if ($code) {
            $this->session->requestAccessToken($code);
            $accessToken = $this->session->getAccessToken();

            // Token speichern (Session, Database, etc.)

            return $this->redirect('/');
        }

        return $this->redirect('/');
    }
}

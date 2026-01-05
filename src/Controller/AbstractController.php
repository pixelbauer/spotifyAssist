<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Twig\Environment;

abstract class AbstractController
{
    public function __construct(
        protected Environment $twig
    ) {
    }

    protected function render(string $template, array $parameters = []): Response
    {
        $content = $this->twig->render($template, $parameters);
        return new Response($content);
    }

    protected function json(mixed $data, int $status = Response::HTTP_OK): JsonResponse
    {
        return new JsonResponse($data, $status);
    }

    protected function redirect(string $url, int $status = Response::HTTP_FOUND): Response
    {
        $response = new Response('', $status);
        $response->headers->set('Location', $url);
        return $response;
    }
}

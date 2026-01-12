<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Component\HttpFoundation\Response;

final class ProductsController extends AbstractController
{
    #[Route('/{_locale}/products', name: 'app_products', requirements: ['_locale' => 'en|sr'])]
    public function index(HttpClientInterface $client, Request $request): JsonResponse {
        $drupalHost = $this->getParameter('app.drupal_host');
        $locale = $request->getLocale();
        $response = $client->request('GET', $drupalHost . '/' . $locale . '/api/products', [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);

        $products = $response->toArray();

        return $this->json($products);
    }
}

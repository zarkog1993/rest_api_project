<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class ProductsController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/products', name: 'app_products')]
    public function index(HttpClientInterface $client, Request $request)
    {
        $drupalHost = $this->getParameter('app.drupal_host');
        $response = $client->request('GET', $drupalHost . '/api/products', [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);

        $products = $response->toArray();

        return $this->json($products);
    }
}

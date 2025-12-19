<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class ProductsController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/products', name: 'app_products')]
    public function index(HttpClientInterface $client)
    {
        $response = $client->request('GET','http://drupal/api/products');
        $products = $response->toArray();

        return $this->render('products/show.html.twig', [
            'products' => $products,
        ]);

    }
}

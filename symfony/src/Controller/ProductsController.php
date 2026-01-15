<?php

namespace App\Controller;

use App\Service\DrupalApiClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class ProductsController extends AbstractController
{
    #[Route('/{_locale}/products', name: 'app_products', requirements: ['_locale' => 'en|sr'])]
    public function index(DrupalApiClient $drupalApiClient, Request $request): JsonResponse {

        $products = $drupalApiClient->getProducts($request->getLocale(), 'products');

        return $this->json($products);
    }
}

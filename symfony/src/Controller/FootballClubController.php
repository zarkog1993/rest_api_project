<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\DrupalApiClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class FootballClubController extends AbstractController
{
    #[Route('/{_locale}/football/club', name: 'app_football_club', requirements: ['_locale' => 'en|sr'])]
    public function index(DrupalApiClient $drupalApiClient, Request $request): JsonResponse
    {
        $footballClubs = $drupalApiClient->getDrupalContent($request->getLocale(), 'football-clubs');
        return $this->json($footballClubs);
    }
}

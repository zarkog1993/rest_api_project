<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class DrupalApiClient {
    private HttpClientInterface $client;
    private string $drupalHost;

    public function __construct(HttpClientInterface $client, string $drupalHost) {
        $this->client = $client;
        $this->drupalHost = rtrim($drupalHost, '/');
    }

    public function getProducts(string $local, $path): array
    {
        try {
            return $this->fetch($local, $path);
        } catch (\Exception $e) {
            return $this->fetch('en', $path);
        }
    }

    private function fetch(string $local, string $path): array
    {
        $url = sprintf('%s/%s/api/%s', $this->drupalHost, $local, $path);

        return $this->client->request('GET', $url)->toArray();
    }
}

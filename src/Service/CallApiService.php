<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    public function __construct(HttpClientInterface $client) {
        $this->client = $client;
    }

    public function callApi() {
        $method = 'GET';
        $url = 'https://aws.random.cat/meow';

        $request = $this->client->request(
            $method,
            $url,
        );

        $response = $request->toArray();

        dd($response);

        return $response;
    }
}
<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait HasApiRequest
{
    public function requestService($method, $requestUrl, $formParams = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri
        ]);

        $response = $client->request($method, $requestUrl, [
            'form_params' => $formParams,
            'headers' => $headers
        ]);
        return json_decode($response->getBody()->getContents());
    }
}
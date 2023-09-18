<?php
namespace App\Util;

use GuzzleHttp\Client;

class Exchange
{
    protected $client;

    private $baseUrl;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->baseUrl =  config('services.exchanger.exchanger_base_url');
    }

    public function allExchangeRates()
    {
        return $this->endpointRequest('/dummy/posts');
    }

    public function specificConversion($data)
    {
        return $this->endpointRequest($this->baseUrl.'?'.$data);
    }

    public function endpointRequest($url)
    {
        try {
            $response = $this->client->request('GET', $url);
        } catch (\Exception $e) {
            return [];
        }

        return $this->response_handler($response->getBody()->getContents());
    }

    public function response_handler($response)
    {
        if ($response) {
            return json_decode($response);
        }

        return [];
    }
}
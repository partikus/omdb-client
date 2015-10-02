<?php

namespace ClearCode\OMDB;

use ClearCode\OMDB\Request\Factory\RequestParamFactory;
use ClearCode\OMDB\Request\Factory\RequestParamFactoryInterface;
use ClearCode\OMDB\Request\Request;
use ClearCode\OMDB\Response\Response;
use GuzzleHttp\ClientInterface;

class Client
{
    protected $apiUrl = 'http://www.omdbapi.com/?';
    protected $apiKey;
    protected $client;
    protected $requestParamFactory;

    public function __construct(
        $apiKey = null, ClientInterface $client = null,
        RequestParamFactoryInterface $requestParamFactory = null
    ) {
        $this->apiKey = $apiKey;
        $this->client = $client;
        $this->requestParamFactory = $requestParamFactory;
    }

    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * @return \GuzzleHttp\Client|ClientInterface
     */
    protected function getClient()
    {
        if (!isset($this->client)) {
            $this->client = new \GuzzleHttp\Client();
        }

        return $this->client;
    }

    public function getRequestParamFactory()
    {
        if (!isset($this->requestParamFactory)) {
            $this->requestParamFactory = new RequestParamFactory();
        }

        return $this->requestParamFactory;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function send(Request $request)
    {
        $requestParams = $this->getRequestParamFactory()->buildParams($request);
        $response = $this->getClient()->get(
            $this->getApiUrl(),
            array(
                'query' => $requestParams
            )
        );

        return new Response(json_decode($response->getBody()->getContents()), true);
    }
}

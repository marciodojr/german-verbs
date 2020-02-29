<?php

namespace Mdojr\GermanVerbs;

use GuzzleHttp\Client;

class Verb
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getVerbsStartingWith(string $verbPrefix)
    {
        $path = sprintf('/db/verbindex/13/%s', $verbPrefix);
        $result = $this->get($path);

        $parsedResult = [];

        foreach ($result as $verb) {
            if (!$verb['type']) {
                $parsedResult[] = $verb;
            }
        }

        return $parsedResult;
    }

    private function get(string $path)
    {
        $response = $this->client->get($path);

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }
}

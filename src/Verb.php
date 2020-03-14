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
        $result = $this->getJson($path);

        $parsedResult = [];

        foreach ($result as $verb) {
            $parsedResult[$verb['verb']] = [
                'verb' => $verb['verb'],
                'langid' => $verb['langid']
            ];
        }

        return array_values($parsedResult);
    }

    private function getJson(string $path)
    {
        $response = $this->client->get($path);

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }

    public function getDetails(string $verb)
    {
        $path = sprintf('/conjugator/iv1/ab8e7bb5-9ac6-11e7-ab6a-00089be4dcbc/1/13/113/%s', $verb);
        $result = $this->getJson($path);

        return $result;
    }
}

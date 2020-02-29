<?php

namespace Mdojr\GermanVerbsTest;

use GuzzleHttp\Client;
use Mdojr\GermanVerbs\Verb;
use PHPUnit\Framework\TestCase;

class VerbTest extends TestCase
{
    private $verb;

    public function setUp(): void
    {
        $client = new Client([
            'base_uri' => 'https://api.verbix.com',
            'timeout' => 5.0
        ]);
        $this->verb = new Verb($client);
    }

    public function testFindVerbWithAPrefix()
    {
        $result = $this->verb->getVerbsStartingWith('a');

        $this->assertCount(2, $result);

        $this->assertEquals('aalen', $result[0]['data']);
        $this->assertEquals('aasen', $result[1]['data']);

        var_dump($result);
    }
}

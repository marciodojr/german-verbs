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

        // var_dump($result);

        $this->assertCount(3, $result);

        $this->assertEquals('aalen', $result[0]['data']);
        $this->assertEquals('aasen', $result[1]['data']);
    }

    public function testFindVerbDetails()
    {
        $result = $this->verb->getDetails('hören');

        $this->assertArrayHasKey('p1', $result);
    }

    public function testFindVerbTranslations()
    {
        $result = $this->verb->getTranslations('schlagen');

        $this->assertArrayHasKey('p1', $result);
    }
}

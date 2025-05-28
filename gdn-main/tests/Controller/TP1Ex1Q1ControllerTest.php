<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class TP1Ex1Q1ControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/t/p1/ex1/q1');

        self::assertResponseIsSuccessful();
    }
}

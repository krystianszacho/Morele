<?php

namespace App\Tests\Service;

use App\Service\MovieRecommendationService;
use PHPUnit\Framework\TestCase;

class MovieRecommendationServiceTest extends TestCase
{
    private $service;

    protected function setUp(): void
    {
        var_dump(__DIR__);
        $this->service = new MovieRecommendationService(__DIR__ . '/../../src/movies.php');
    }

    public function testGetRandomMovies(): void
    {
        $movies = $this->service->getRandomMovies();

        $this->assertCount(3, $movies);
    }

    public function testGetEvenLengthMoviesStartingWithW(): void
    {
        $movies = $this->service->getEvenLengthMoviesStartingWithW();

        $this->assertContains('WALL-E', $movies);
        $this->assertContains('WALL STREET', $movies);
        $this->assertNotContains('WALL', $movies);
        $this->assertNotContains('WALLS', $movies);
        $this->assertNotContains('WALLS-E', $movies);
    }

    public function testGetMultiWordMovies(): void
    {
        $movies = $this->service->getMultiWordMovies();

        $this->assertContains('WALL-E', $movies);
        $this->assertContains('WALL STREET', $movies);
        $this->assertContains('THE DARK KNIGHT', $movies);
        $this->assertNotContains('WALL', $movies);
        $this->assertNotContains('WALLS', $movies);
        $this->assertNotContains('WALLS-E', $movies);
    }
}
<?php

namespace App\Tests\Service;

use App\Service\MovieRecommendationService;
use App\Service\Recommendation\RandomMoviesRecommendation;
use App\Service\Recommendation\EvenLengthMoviesStartingWithWRecommendation;
use App\Service\Recommendation\MultiWordMoviesRecommendation;
use PHPUnit\Framework\TestCase;

final class MovieRecommendationServiceTest extends TestCase
{
    private MovieRecommendationService $service;

    protected function setUp(): void
    {
        $this->service = new MovieRecommendationService(__DIR__ . '/../../src/movies.php');
    }

    public function testGetRandomMovies(): void
    {
        $movies = $this->service->getRecommendations(new RandomMoviesRecommendation());

        $this->assertCount(3, $movies);
    }

    public function testGetEvenLengthMoviesStartingWithW(): void
    {
        $movies = $this->service->getRecommendations(new EvenLengthMoviesStartingWithWRecommendation());

        $this->assertContains('WALL-E', $movies);
        $this->assertContains('WALL STREET', $movies);
        $this->assertNotContains('WALL', $movies);
        $this->assertNotContains('WALLS', $movies);
        $this->assertNotContains('WALLS-E', $movies);
    }

    public function testGetMultiWordMovies(): void
    {
        $movies = $this->service->getRecommendations(new MultiWordMoviesRecommendation());

        $this->assertContains('WALL-E', $movies);
        $this->assertContains('WALL STREET', $movies);
        $this->assertContains('THE DARK KNIGHT', $movies);
        $this->assertNotContains('WALL', $movies);
        $this->assertNotContains('WALLS', $movies);
        $this->assertNotContains('WALLS-E', $movies);
    }
}

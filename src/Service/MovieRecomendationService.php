<?php

namespace App\Service;

use App\Service\Recommendation\RecommendationStrategyInterface;

final class MovieRecommendationService
{
    private array $movies;

    public function __construct(string $moviesFilePath)
    {
        $this->movies = require $moviesFilePath;
    }

    public function getRecommendations(RecommendationStrategyInterface $strategy): array
    {
        return $strategy->recommend($this->movies);
    }
}
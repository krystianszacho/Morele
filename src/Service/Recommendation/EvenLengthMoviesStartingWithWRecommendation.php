<?php

namespace App\Service\Recommendation;

class EvenLengthMoviesStartingWithWRecommendation implements RecommendationStrategyInterface
{
    public function recommend(array $movies): array
    {
        return array_filter($movies, function ($movie) {
            return str_starts_with($movie, 'W') && strlen($movie) % 2 === 0;
        });
    }
}
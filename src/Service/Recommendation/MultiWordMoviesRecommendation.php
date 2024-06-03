<?php

namespace App\Service\Recommendation;

final class MultiWordMoviesRecommendation implements RecommendationStrategyInterface
{
    public function recommend(array $movies): array
    {
        return array_filter($movies, function ($movie) {
            return str_word_count($movie,  0) > 1;
        });
    }
}
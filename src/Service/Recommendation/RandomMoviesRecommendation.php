<?php

namespace App\Service\Recommendation;

class RandomMoviesRecommendation implements RecommendationStrategyInterface
{
    private int $count;

    public function __construct(int $count = 3)
    {
        $this->count = $count;
    }

    public function recommend(array $movies): array
    {
        $count = min($this->count, count($movies));
        $keys = (array) array_rand($movies, $count);

        return array_map(function ($key) use ($movies) {
            return $movies[$key];
        }, $keys);
    }
}

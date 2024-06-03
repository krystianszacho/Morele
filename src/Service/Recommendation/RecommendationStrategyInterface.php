<?php

namespace App\Service\Recommendation;

interface RecommendationStrategyInterface
{
    public function recommend(array $movies): array;
}
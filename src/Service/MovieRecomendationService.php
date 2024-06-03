<?php

namespace App\Service;

class MovieRecommendationService
{
    private array $movies;

    public function __construct(string $moviesFilePath)
    {
        $this->movies = require $moviesFilePath;
    }

    public function getRandomMovies(int $count = 3): array
    {
        $count = min($count, count($this->movies));
        $keys = (array) array_rand($this->movies, $count);

        return array_map(function ($key) {
            return $this->movies[$key];
        }, $keys);
    }

    public function getEvenLengthMoviesStartingWithW(): array
    {
        return array_filter($this->movies, function ($movie) {
            return str_starts_with($movie, 'W') && strlen($movie) % 2 === 0;
        });
    }

    public function getMultiWordMovies(): array
    {
        return array_filter($this->movies, function ($movie) {
            return str_word_count($movie, 0) > 1;
        });
    }
}
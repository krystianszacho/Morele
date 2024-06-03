<?php

namespace App\Controller;

use App\Service\MovieRecommendationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MovieController extends AbstractController
{
    private MovieRecommendationService $recommendationService;

    public function __construct(MovieRecommendationService $recommendationService)
    {
        $this->recommendationService = $recommendationService;
    }

    public function index(): Response
    {
        $randomMovies = $this->recommendationService->getRandomMovies();
        $moviesStartingWithW = $this->recommendationService->getEvenLengthMoviesStartingWithW();
        $multiWordMovies = $this->recommendationService->getMultiWordMovies();

        return $this->render('movies/index.html.twig', [
            'random_movies' => $randomMovies,
            'movies_starting_with_w' => $moviesStartingWithW,
            'multi_word_movies' => $multiWordMovies,
        ]);
    }
}
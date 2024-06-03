<?php
namespace App\Controller;

use App\Service\MovieRecommendationService;
use App\Service\Recommendation\RandomMoviesRecommendation;
use App\Service\Recommendation\EvenLengthMoviesStartingWithWRecommendation;
use App\Service\Recommendation\MultiWordMoviesRecommendation;
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
        $randomMovies = $this->recommendationService->getRecommendations(new RandomMoviesRecommendation());
        $moviesStartingWithW = $this->recommendationService->getRecommendations(new EvenLengthMoviesStartingWithWRecommendation());
        $multiWordMovies = $this->recommendationService->getRecommendations(new MultiWordMoviesRecommendation());

        return $this->render('movies/index.html.twig', [
            'random_movies' => $randomMovies,
            'movies_starting_with_w' => $moviesStartingWithW,
            'multi_word_movies' => $multiWordMovies,
        ]);
    }
}
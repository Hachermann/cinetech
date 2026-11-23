<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\MovieRepository;
use App\Entity\Movie;

final class MovieController extends AbstractController
{
    public function __construct(private readonly MovieRepository $movieRepository) {}

    #[Route('/catalogue', name: 'app_movie_index')]
    public function index(Request $request): Response
    {
        $search = $request->query->get('search', 'general');

        return $this->render('movie/index.html.twig', [
            'movies' => $this->movieRepository->findAllwithCategory(),
            'tag' => $search,
        ]);
    }

    #[Route('/catalogue/{id}', name: 'app_movie_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Movie $movie): Response
    {
        // Symfony interroge automatiquement la BDD via {id}
        // et renvoie une vraie réponse HTTP 404 si l'entité n'existe pas.
        return $this->render('movie/show.html.twig', ['movie' =>
        $movie]);
    }

    #[Route('/api/catalogue', name: 'app_movie_list')]
    public function ping(): JsonResponse
    {
        return $this->json([
            'premier film' => 'star trek',
            'deuxième film' => 'harry potter',
            'troisieme film' => 'dune',
        ]);
    }
}

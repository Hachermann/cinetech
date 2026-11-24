<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\MovieRepository;
use App\Entity\Movie;
use App\Form\CatalogueFilmType;

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

    #[Route('/catalogue/nouveau', name: 'app_movie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $movie = new Movie();
        $form = $this->createForm(CatalogueFilmType::class, $movie);
        // 1. Inspecte la requête : si POST, hydrate automatiquement $movie
        $form->handleRequest($request);
        // 2. Vérifie l'envoi ET toutes les contraintes #[Assert\...]
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($movie);
            $em->flush();
            // 3. Pattern PRG (Post-Redirect-Get, code 303 compatible Turbo) + Flash
            $this->addFlash('success', 'Le film a bien été créé.');
            return $this->redirectToRoute('app_movie_index', [], Response::HTTP_SEE_OTHER);
        }
        // Symfony 8 convertit $form en FormView et renvoie 422 automatiquement si invalide
        return $this->render('movie/new.html.twig', ['form' => $form]);
    }
    #[Route('/catalogue/{id}/modifier', name: 'app_movie_edit', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function edit(Movie $movie, Request $request, EntityManagerInterface $em): Response
    {
        // Le formulaire reçoit l'objet déjà hydraté depuis la BDD
        $form = $this->createForm(CatalogueFilmType::class, $movie);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Inutile d'appeler persist() : Doctrine surveille déjà $product !
            $em->flush();
            $this->addFlash('success', 'Les modifications ont été enregistrées.');
            return $this->redirectToRoute('app_movie_show', ['id' => $movie->getId()], Response::HTTP_SEE_OTHER);
        }
        return $this->render('movie/edit.html.twig', ['form' => $form, 'movie' => $movie]);
    }
    #[Route(
        '/catalogue/{id}/supprimer',
        name: 'app_movie_delete',
        requirements: ['id' => '\d+'],
        methods: ['POST']
    )]
    public function delete(
        Movie $movie,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $token = $request->getPayload()->getString('_token');
        if ($this->isCsrfTokenValid('delete' . $movie->getId(), $token)) {
            $em->remove($movie);
            $em->flush();
            $this->addFlash('warning', 'Film supprimé.');
        }
        return $this->redirectToRoute(
            'app_movie_index',
            [],
            Response::HTTP_SEE_OTHER
        );
    }
}

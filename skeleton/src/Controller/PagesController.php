<?php

namespace App\Controller;

use App\Entity\Portfolio;
use App\Repository\PortfolioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(PortfolioRepository $portfolioRepository): Response
    {
        return $this->render('pages/index.html.twig', [
            'portfolio' => $portfolioRepository->findAll(),
        ]);
    }

    #[Route('/mentions', name: 'mentions')]
    public function mentions(): Response
    {
        return $this->render('pages/mentions.html.twig', [
        ]);
    }

    #[Route('/confidentialite', name: 'confidentialite')]
    public function confidentialite(): Response
    {
        return $this->render('pages/confidentialite.html.twig', [
        ]);
    }

    #[Route('/portfolio/{id}', name: 'show_client', methods: ['GET'])]
    public function showClient(Portfolio $portfolio): Response
    {

        return $this->render('pages/showClient.html.twig', [
            'portfolio' => $portfolio
        ]);
    }
}

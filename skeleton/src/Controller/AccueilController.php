<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
        ]);
    }

    #[Route('/mentions', name: 'mentions')]
    public function mentions(): Response
    {
        return $this->render('accueil/mentions.html.twig', [
        ]);
    }

    #[Route('/confidentialite', name: 'confidentialite')]
    public function confidentialite(): Response
    {
        return $this->render('accueil/confidentialite.html.twig', [
        ]);
    }
}

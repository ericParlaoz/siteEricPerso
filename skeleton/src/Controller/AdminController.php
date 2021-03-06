<?php

namespace App\Controller;

use App\Repository\PortfolioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/adminericparlaoz', name: 'app_admin')]
    public function index(): Response
    {
        return $this->redirectToRoute('app_portfolio_index');
    }
}

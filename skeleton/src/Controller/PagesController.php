<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Portfolio;
use App\Form\ContactType;
use App\Repository\PortfolioRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(PortfolioRepository $portfolioRepository, Request $request, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $emailNom = $contact->getNom();
            $emailTel = $contact->getTelephone();
            $emailEmail = $contact->getEmail();
            $emailMessage = $contact->getMessage();
            $emailRgpd = $contact->getRgpd();



            $email = (new TemplatedEmail())
                ->from('contact@eric-parlaoz.fr')
                ->to('contact@eric-parlaoz.fr')
                ->text('Nouvelle email')
                ->subject('Nouveau message')
                ->htmlTemplate('mail/index.html.twig')
                ->context([
                    'emailNom' => $emailNom,
                    'emailTel' => $emailTel,
                    'emailEmail' => $emailEmail,
                    'emailMessage' => $emailMessage,
                    'emailRgpd' => $emailRgpd
                ]);

                $mailer->send($email);

            $this->addFlash('success', 'Message envoyé');
            return $this->redirect('#contact');
        }

        return $this->render('pages/index.html.twig', [
            'portfolio' => $portfolioRepository->findAll(),
            'form' => $form->createView()
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

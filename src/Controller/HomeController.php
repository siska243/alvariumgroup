<?php

namespace App\Controller;

use App\Repository\OffreEmploiRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/",name="app_home",methods={"GET"})
     */
    public function index(OffreEmploiRepository $offreEmploiRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'offres' => $offreEmploiRepository->findAll(),
        ]);
    }
    /**
     * @Route("/offre/{slug}",name="app_home_offre",methods={"GET"})
     */
    public function offre(OffreEmploiRepository $offreEmploiRepository,$slug): Response
    {
        return $this->render('home/offre.html.twig', [
            'offre_emploi' => $offreEmploiRepository->findOneBy(['slug' => $slug]),
        ]);
    }
}

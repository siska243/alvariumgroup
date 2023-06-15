<?php

namespace App\Controller;

use App\Repository\OffreEmploiRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/",name="app_home",methods={"GET"})
     */
    public function index(OffreEmploiRepository $offreEmploiRepository,PaginatorInterface $paginator, Request $request): Response
    {
        $offres = $offreEmploiRepository->findAll();
        $offre_emplois = $paginator->paginate(
            $offres, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );
        return $this->render('home/index.html.twig', [
            'offres' => $offre_emplois,
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

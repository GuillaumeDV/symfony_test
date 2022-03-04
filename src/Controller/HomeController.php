<?php
namespace App\Controller;

use App\Repository\OffersRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(OffersRepository $repository): Response
    {
        $offers = $repository->findAll();
        return $this->render('home/index.html.twig', [
            'offers' => $offers,
        ]);
    }

    /**
     * @Route("/offres/{id}", name="offer.show")
     */
    public function show($id, OffersRepository $repository): Response
    {
        $offer = $repository->find($id);
        return $this->render('home/show.html.twig', [
            'offer' => $offer,
        ]);
    }
    /**
     * @Route("/créer", name="offer.create")
     */
    public function create(): Response
    {
        return $this->render('home/create.html.twig');
    }
}
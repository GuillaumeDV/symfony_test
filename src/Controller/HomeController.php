<?php
namespace App\Controller;

use App\Entity\Offers;
use App\Form\OfferType;
use App\Form\NewofferType;
use App\Repository\OffersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @var OffersRepository
     */
    private $repository;

    public function __construct(OffersRepository $repository, EntityManagerInterface $em){
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $offers = $this->repository->findAll();
        return $this->render('home/index.html.twig', [
            'offers' => $offers,
        ]);
    }

    /**
     * @Route("/offres/{id}", name="offer.show")
     */
    public function show($id): Response
    {
        $offer = $this->repository->find($id);
        return $this->render('home/show.html.twig', [
            'offer' => $offer,
        ]);
    }
    /**
     * @Route("/créer", name="offer.create")
     */
    public function create(Request $request): Response
    {
        $offer = new Offers();

        $form = $this->createForm(NewofferType::class, $offer);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($offer);
            $this->em->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('home/create.html.twig', [
            'offer' => $offer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/éditer/{id}", name="offer.edit")
     */
    public function edit($id, Request $request): Response
    {
        $offer = $this->repository->find($id);

        $form = $this->createForm(OfferType::class, $offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('home/edit.html.twig', [
            'offer' => $offer,
            'form' => $form->createView(),
        ]);
    }
}
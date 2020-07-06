<?php

namespace App\Controller;

use App\Entity\Annonce;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceUserController extends AbstractController
{
    /**
     * @Route("/", name="annonce_user")
     */
    public function index(Request $request, PaginatorInterface $paginatorInterface): Response
    {
        $annonce = new Annonce();

        $donnee = $this->getDoctrine()->getRepository(Annonce::class)->findAll();

        $annonce = $paginatorInterface->paginate(
            $donnee,
            $request->query->getInt('page',1),
            5
        );


        return $this->render('annonce_user/index.html.twig', [
            'annonces' => $annonce
        ]);
    }
}

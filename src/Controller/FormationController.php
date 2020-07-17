<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Repository\FormationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FormationController extends AbstractController
{
    /**
     * @Route("/formation", name="formation")
     */
    public function indexFormation(Request $request, FormationRepository $formationRepository)
    {
        $repo = $this->getDoctrine()->getRepository(Formation::class);
        $formation = $repo->findAll();

      
        return $this->render('formation/index.html.twig', [
            'formations' => $formation
        ]);
    }

    /**
     * @Route("/show/formation/{id}", name="show_formation")
     */
    public function showFormation(Formation $formations, $id, Request $request, EntityManagerInterface $manager)
    {
     
        return $this->render('formation/show_formation.html.twig', [
            'formations' => $formations,
        ]);
    }

}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomePersonnelController extends AbstractController
{
    /**
     * @Route("/home/personnel", name="home_personnel")
     */
    public function index()
    {
        return $this->render('home_personnel/index.html.twig', [
            'controller_name' => 'HomePersonnelController',
        ]);
    }
}

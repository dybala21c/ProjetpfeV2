<?php

namespace App\Controller;

use App\Entity\Enseignant;
use App\Form\EnseignantRegistrationType;
use App\Repository\EnseignantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class EnseignantRegistrationController extends AbstractController
{
    /**
     * @Route("/enseignant/registration", name="enseignant_registration")
     */
    public function EnseignantRegister(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $enseignant = new Enseignant();
        $form = $this->createForm(EnseignantRegistrationType::class, $enseignant);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $enseignant->setPassword(
                $passwordEncoder->encodePassword(
                    $enseignant,
                    $form->get('password')->getData()
                )
            );

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($enseignant);
            $manager->flush();

            return $this->redirectToRoute('list_enseignant');
        }

        return $this->render('enseignant_registration/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/enseignant/connexion", name="app_login3")
     */
    public function loginEnseignant(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login_enseignant.html.twig', [
            'last_username' => $lastUsername, 'error' => $error
            ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
    
    
     /**
     * @Route("/liste", name="list_enseignant", methods={"GET"})
     */
    public function index(Request $request,PaginatorInterface $paginatorInterface)
    {
        
        $enseignant = new Enseignant();

        $donnee = $this->getDoctrine()->getRepository(Enseignant::class)->findAll();
       
        $enseignant = $paginatorInterface->paginate(
            $donnee,
            $request->query->getInt('page',1),
            4
        );

        return $this->render('enseignant_registration/liste.html.twig', [
            'enseignants' => $enseignant
        ]);
    }

}

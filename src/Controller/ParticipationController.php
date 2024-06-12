<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ParticipationController extends AbstractController
{
    #[Route('/participation/user', name: 'app_participation_user')]
    public function index(UserRepository $userRepository): Response
    {
        $event=$this->getUser()->getEvenement();
        return $this->render('participation/index.html.twig', [
            "evenements"=>$event
        ]);
    }

    #[Route('/participation/add/{id}', name: 'app_participation_add')]
    public function add(EntityManagerInterface $entityManager,Evenement $event): Response
    {
        $user=$this->getUser();
        if ($user==null)
            return throw new Exception("User not connected");

        $user->addEvenement($event);
        $entityManager->flush();
        
        return $this->redirectToRoute('app_participation_user', [], Response::HTTP_SEE_OTHER);  
    }

    #[Route('/participation/delete/{id}', name: 'app_participation_delete')]
    public function delete(EntityManagerInterface $entityManager,Evenement $event): Response
    {
        $user=$this->getUser();
        if ($user==null)
            return throw new Exception("User not connected");

        $user->removeEvenement($event);
        $entityManager->flush();
        
        return $this->redirectToRoute('app_participation_user', [], Response::HTTP_SEE_OTHER);  
    }
}

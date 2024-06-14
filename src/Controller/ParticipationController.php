<?php

namespace App\Controller;

use Exception;
use App\Entity\Evenement;
use Symfony\Component\Mime\Email;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
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
    public function add(EntityManagerInterface $entityManager,Evenement $event, MailerInterface $mailer): Response
    {
        $user=$this->getUser();
        if ($user==null)
            return throw new Exception("User not connected");
        // echo $user->getEmail();
        $email = (new Email())
            ->from('bot.love.test@gmail.com')
            // ->to($user->getEmail())
            ->to('bot.love.test@gmail.com')
            // ->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        $user->addEvenement($event);
        $entityManager->flush();
        $toto = $mailer->send($email);
        // dd($toto);
        
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

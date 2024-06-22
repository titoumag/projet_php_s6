<?php

namespace App\Controller;

use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET'])]
    public function index(EvenementRepository $evenementRepository): Response
    {
        // if(isset($_GET['page']) && !empty($_GET['page'])){
            // $currentPage = (int) strip_tags($_GET['page']);
        // }else{
            // $currentPage = 1;
        // }
        // if(isset($_GET['nb_events']) && !empty($_GET['nb_events'])){
            // $nb_events = (int) strip_tags($_GET['nb_events']);
        // }else{
            // $nb_events = 40;
        // }
        // dd ($currentPage);
        // dd ($nb_events);
        return $this->render('home.html.twig', [
            'evenements' => $evenementRepository->findAll(),
        ]);
    }

}

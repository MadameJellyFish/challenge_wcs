<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArgonautesController extends AbstractController
{
    #[Route('/', name: 'app_argonautes')]
    public function index(): Response
    {
        return $this->render('argonautes/index.html.twig', [
            'controller_name' => 'ArgonautesController',
        ]);
    }
}

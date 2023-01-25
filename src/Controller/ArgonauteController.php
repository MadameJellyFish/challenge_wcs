<?php

namespace App\Controller;

use App\Entity\Argonaute;
use App\Repository\ArgonauteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArgonauteController extends AbstractController
{
    private ArgonauteRepository $repo;

    public function __construct(ArgonauteRepository $repo)
    {
        $this->repo = $repo;
    }

    #[Route('/', name:'argonaute.create', methods:['GET','POST'])]
    public function create(Request $request): Response
    {
        $submit = $request->get('submit');

        $argonautes = $this->repo->findAll();

        if(!isset($submit)) {
            return $this->render('argonaute/create.html.twig', ['mesargonautes' => $argonautes]);
        }
        // dd('ici');
        $inputNewArgonaute = trim($request->get('inputNewArgonaute'));

        if(empty($inputNewArgonaute)){
            return $this->render('argonaute/create.html.twig', [
                'error'=> 'L`argonaute est requis !',
                'monargonaute' => $argonautes
            ]);
        }

        $argonaute = new Argonaute();
        $argonaute->setNom($inputNewArgonaute);
        // dd($argonaute);
        $this->repo->save($argonaute, true);

        return $this->redirect('/');
    }
    
    }


   

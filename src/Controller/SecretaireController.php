<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecretaireController extends AbstractController
{
    /**
     * @Route("/secretaire", name="secretaire")
     */
    public function index(): Response
    {
        return $this->render('secretaire/index.html.twig', [
            'controller_name' => 'SecretaireController',
        ]);
    }
}

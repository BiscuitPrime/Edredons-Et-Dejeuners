<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgvoyController extends AbstractController
{
    /**
     * @Route("/agvoy", name="agvoy")
     */
    public function index(): Response
    {
        return $this->render('agvoy/index.html.twig', [
            'controller_name' => 'AgvoyController',
        ]);
    }
}

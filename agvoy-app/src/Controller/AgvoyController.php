<?php

namespace App\Controller;

use App\Entity\Room;
use App\Entity\Region;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgvoyController extends AbstractController
{
    /**
     * Main Page of the project (when you enter the site)
     * 
     * @Route("/agvoy", name="agvoy")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $rooms = $em->getRepository(Room::class)->findAll();
        
        dump($rooms);

        return $this->render('agvoy/index.html.twig', [
            'controller_name' => 'AgvoyController',
            'rooms' => $rooms,
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgvoyController extends AbstractController
{
    /**
     * Main Page of th project (when you enter the site)
     * 
     * @Route("/agvoy", name="agvoy")
     */
    public function index(): Response
    {
        return $this->render('agvoy/index.html.twig', [
            'controller_name' => 'AgvoyController',
        ]);
    }

    /**
     * Public version of a room
     * 
     * @Route("agvoy/public_room_show", name="public_room_show", methods="GET")
     */
    public function publicShow()
    {
        return $this->render('rooms/display.html.twig',['message'=>"Public", 'otherMessage'=>"Private", 'link'=>"http://localhost:8000/agvoy/private_room_show"]);
    }

    /**
     * Private version of a room
     * 
     * @Route("agvoy/private_room_show", name="private_room_show", methods="GET")
     */
    public function privateShow()
    {
        return $this->render('rooms/display.html.twig',['message'=>"Private", 'otherMessage'=>"Public", 'link'=>"http://localhost:8000/agvoy/public_room_show"]);
    }
}

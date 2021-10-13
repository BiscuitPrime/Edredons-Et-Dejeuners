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
        $em = $this->getDoctrine()->getManager();
        $regions = $em->getRepository(Region::class)->findAll();
        dump($regions);
        $regionNameList=[];

        foreach ($regions as $region){
            $regionList[]=$region->getName();
        }

        $regionNameSelected=null;

        return $this->render('agvoy/index.html.twig', [
            'controller_name' => 'AgvoyController',
            'rooms' => $rooms,
            'regions' => $regionList,
            'regionSelected'=>$regionNameSelected,
        ]);
    }

    /**
     * @Route("/agvoy/{regionNameSelected}", name="agvoy_region")
     */
    public function listName(String $regionNameSelected):Response
    {
        $em = $this->getDoctrine()->getManager();
        $rooms = $em->getRepository(Room::class)->findAll();
        
        dump($rooms);
        $em = $this->getDoctrine()->getManager();
        $regions = $em->getRepository(Region::class)->findAll();
        dump($regions);
        $regionNameList=[];
        
        foreach ($regions as $region){
            $regionList[]=$region->getName();
        }

        return $this->render('agvoy/index.html.twig', [
            'controller_name' => 'AgvoyController',
            'rooms' => $rooms,
            'regions' => $regionList,
            'regionSelected'=>$regionNameSelected,
        ]);
    }

    /**
     * @Route("/basket", name="basket", methods="GET")
     */
    public function basket() : Response
    {
        $em = $this->getDoctrine()->getManager();
        $rooms = $em->getRepository(Room::class)->findAll();
        
        dump($rooms);
        $urgents = $this->get('session')->get('urgents');
        
        $roomBasketList=[];
        $message='Aucun édredon sélectionné :(';
        if (is_null($urgents)){
            $urgents=array();
        }
        else
        {
            foreach ($rooms as $room){
                if(in_array($room->getId(),$urgents)){
                    $roomBasketList[]=$room;
                }
            }
            $message='Les édredons que vous avez sélectionnés :';
        }
        return $this->render('agvoy/basket.html.twig', [
            'rooms'=>$roomBasketList,
            'Message'=>$message
        ]);
    }
}

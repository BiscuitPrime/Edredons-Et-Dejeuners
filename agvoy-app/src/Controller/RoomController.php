<?php

namespace App\Controller;

use App\Entity\Room;
use App\Entity\Region;
use App\Form\RoomType;
use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/room")
 */
class RoomController extends AbstractController
{
    /**
     * @Route("/list", name="room_index", methods={"GET"})
     */
    public function index(RoomRepository $roomRepository): Response
    {
        return $this->render('room/index.html.twig', [
            'rooms' => $roomRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="room_new", methods={"GET","POST"})
     * @IsGranted("ROLE_USER")
     */
    public function new(Request $request): Response
    {
        $room = new Room();
        $form = $this->createForm(RoomType::class, $room);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($room);
            $entityManager->flush();

            return $this->redirectToRoute('room_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('room/new.html.twig', [
            'room' => $room,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="room_show", methods={"GET"})
     */
    public function show(Room $room): Response
    {
        return $this->render('room/show.html.twig', [
            'room' => $room,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="room_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_USER")
     */
    public function edit(Request $request, Room $room): Response
    {
        $form = $this->createForm(RoomType::class, $room);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('room_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('room/edit.html.twig', [
            'room' => $room,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="room_delete", methods={"POST"})
     * @IsGranted("ROLE_USER")
     */
    public function delete(Request $request, Room $room): Response
    {
        if ($this->isCsrfTokenValid('delete'.$room->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($room);
            $entityManager->flush();
        }

        return $this->redirectToRoute('room_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
    * Mark a room as "marked" (so that the client will remember it) - they will be put in a panier
    * 
    * @Route("/mark/{id}", name="room_mark", requirements={ "id": "\d+"}, methods="GET")
    */
    public function markAction(Room $room): Response
    {
        dump($room);
        $basket = $this->get('session')->get('basket');
        $id=$room->getId();

        $MessagePanier='Ajouter au panier';

        if (is_null($basket)){
            $basket=array();
        }
        // si l'identifiant n'est pas pr??sent dans le tableau des basket, l'ajouter
        if (! in_array($id, $basket) ) 
        {
            $basket[] = $id;
        }
        else
        // sinon, le retirer du tableau
        {
            $basket = array_diff($basket, array($id));
            $MessagePanier='Enlever du panier';
        }
        $this->get('session')->set('basket', $basket);

        return $this->redirectToRoute('room_index', 
        ['id' => $room->getId()]);
    }
}

<?php

namespace App\Controller;

use App\Repository\ClassRoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassRoomController extends AbstractController
{
    /**
     * @Route("/class/room", name="class_room")
     */
    public function index(ClassRoomRepository $classRoomRepository): Response
    {   
        $classrooms = $classRoomRepository->findAll();
        // dd($classrooms);   pour verifier l'affichage 
        
        return $this->render('class_room/index.html.twig', [
            
            'classrooms' => $classrooms,
            
        ]);
    }




   
}

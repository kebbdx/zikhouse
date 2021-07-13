<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/profile", name="user_profile")
     */
    public function profile(): Response
    {
        $user = $this->getUser();
        return $this->render('profile/index.html.twig', [
            
            'user' => $user,
        ]);
    }
}

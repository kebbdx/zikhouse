<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @IsGranted("ROLE_USER")
 */
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

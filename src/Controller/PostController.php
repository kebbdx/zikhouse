<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    // /**
    //  * @Route("/post", name="post")
    //  */
    // public function index(): Response
    // {
    //     return $this->render('post/index.html.twig', [
    //         'controller_name' => 'PostController',
    //     ]);
    // }



    //CREATE

    /**
     * @Route("/add-post", name="add_post")
     */
    public function addPost(Request $request): Response
    {

        $post = new Post();
        $form = $this->createForm(PostFormType::class,$post);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post); // recuperer les infos
            $entityManager->flush(); //envoi en bdd
            return $this->redirectToRoute("posts"); // redirection vers 'posts'
        }
        

        return $this->render("post/add-post.html.twig", [
            "form_title" => "Ajouter un titre",
            "form_text" => $form->createView(),

        ]);
        

    }



    // READ ALL

    /**
     * @Route("/posts", name="posts")
     */
    public function posts()
    {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();

        return $this->render('post/posts.html.twig', [
            "posts" => $posts,
        ]);
    }



        //READ BY ID

        /**
     * @Route("/post/{id}", name="post")
     */
        public function post(int $id): Response
        {
            $post = $this->getDoctrine()->getRepository(Post::class)->find($id);

            return $this->render("post/index.html.twig", [
                "post" => $post,
            ]);
        }






    // UPDATE

    /**

    * @Route("/modify-post/{id}", name="modify_post")
    */
    public function modifyPost(Request $request, int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $post = $entityManager->getRepository(Post::class)->find($id);
        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager->flush();
            return $this->redirectToRoute("posts");// redirection vers 'posts'
        }

        return $this->render("post/modify-post.html.twig", [
            "form_title" => "Modifier un article",
            "form_text" => $form->createView(),
        ]);
    }




    // DELETE

    /**

    * @Route("/delete-post/{id}", name="delete_post")
    */
    public function deletePost(int $id,Request $request): Response
        {
            $submittedToken = $request->request->get('token');

            if ($this->isCsrfTokenValid('delete-post'.$id, $submittedToken)) {

                $entityManager = $this->getDoctrine()->getManager();
                $post = $entityManager->getRepository(Post::class)->find($id);
                $entityManager->remove($post);
                $entityManager->flush();

                return $this->redirectToRoute("posts");
            }
            
            return $this->redirectToRoute("posts");

        }
    }

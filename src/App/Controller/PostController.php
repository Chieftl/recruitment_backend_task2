<?php

namespace App\Controller;

use Domain\Post\PostManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(PostManager $postManager): Response
    {
        return $this->redirectToRoute('app_post_index');
    }

    /**
     * @Route("/post", name="app_post_index")
     */
    public function index(PostManager $postManager): Response
    {
        $posts = $postManager->listPosts();

        return $this->render('post/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/post/{id<\d+>}", name="app_post_show")
     */
    public function show(PostManager $postManager, int $id): Response
    {
        $post = $postManager->findPost($id);

        if (!$post) {
            throw $this->createNotFoundException('The post does not exist');
        }

        return $this->render('post/show.html.twig', [
            'post' => $post,
        ]);
        ]);
    }
}

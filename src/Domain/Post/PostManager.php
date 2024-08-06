<?php

namespace Domain\Post;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;

class PostManager
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function addPost($title, $content)
    {
        $post = new Post();
        $post->setTitle($title);
        $post->setContent($content);
        $this->em->persist($post);
        $this->em->flush();
    }

    public function listPosts(array $opts = ['id' => 'desc'], int $limit = 100): array
    {
        $postRepository = $this->em->getRepository(Post::class);
        return $postRepository->findBy([], $opts, $limit);
    }

    public function findPost(int $id): ?Post
    {
        $postRepository = $this->em->getRepository(Post::class);

        return $postRepository->findOneBy(['id' => $id]);
    }
}

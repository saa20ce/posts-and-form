<?php

namespace App\Controller;

use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/news", name="news")
     */
    public function index(): Response
    {
        $newsRepository = $this->entityManager->getRepository(News::class);
        $news = $newsRepository-> findAll();

        return $this->render('news/index.html.twig', [
            'news' => $news,
        ]);
    }
}

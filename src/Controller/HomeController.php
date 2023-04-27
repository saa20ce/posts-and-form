<?php

namespace App\Controller;

use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $newsRepository = $this->entityManager->getRepository(News::class);
        $latestNews = $newsRepository->findby([], ['publicationDate' => 'DESC'], 3);
        
        if (empty($latestNews)) {
            $this->addFlash('notice', 'Новости не найдены.');
        }
        
        return $this->render('home/index.html.twig', [
            'latestNews' => $latestNews,
        ]);
    }
}

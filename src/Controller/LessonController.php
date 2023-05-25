<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LessonController extends AbstractController
{
    #[Route('/lessons', name: 'app_lesson')]
    public function index(): Response
    {
        $naam = 'daan';

        return $this->render('lessons.html.twig', array('naam' => $naam));
    }

    #[Route('/users/{id}', name: 'app_users')]
    public function users(EntityManagerInterface $entityManager, int $id): Response
    {
        $user = $entityManager->getRepository(User::class)->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $this->render('home/index.html.twig', array('email' => $user->getEmail()));
    }
}

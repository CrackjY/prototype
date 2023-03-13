<?php

namespace App\Controller\Back;

use App\Entity\User\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Config\Framework\SerializerConfig;

class UserController extends AbstractController
{
    #[Route('/api/admin/users', name: 'back_users_list', options: [])]
    public function list(EntityManagerInterface $entityManager, SerializerInterface $serializer): JsonResponse
    {
        $users = $entityManager->getRepository(User::class)->findAll();

        $jsonData = $serializer->serialize($users, 'json');

        return new JsonResponse($jsonData);
    }
}

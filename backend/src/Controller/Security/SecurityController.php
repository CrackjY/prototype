<?php

namespace App\Controller\Security;

use App\Entity\User\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/api/register', name: 'api_register', options: [])]
    public function register(
        EntityManagerInterface $entityManager,
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher
    ): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $currentEmail = $entityManager->getRepository(User::class)->findOneBy(['email' => $data['email']]);

        if ($currentEmail) {
            return new JsonResponse([
                'status' => 500,
                'message' => 'L\'e-mail existe.'
            ]);
        }

        $user = new User();

        $user->setEmail($data['email']);
        $user->setRoles(["ROLE_USER"]);
        $user->setPassword($userPasswordHasher->hashPassword($user, $data['password']));

        $entityManager->persist($user);
        $entityManager->flush();

        return new JsonResponse([
            'status' => 201,
        ]);
    }

    #[Route('/api/logout', name: 'app_logout', options: [])]
    public function logout(): JsonResponse
    {
        return new JsonResponse([
            'message' => 'Logout success !'
        ]);
    }
}

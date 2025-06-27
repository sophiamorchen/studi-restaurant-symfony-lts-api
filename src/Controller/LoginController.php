<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/api/login', name: 'api_login', methods: ['POST'])]
    public function login(Request $request): JsonResponse
    {
        // Récupérer les données JSON envoyées
        $data = json_decode($request->getContent(), true);

        $username = $data['username'] ?? null;
        $password = $data['password'] ?? null;

        // Juste pour test : si username et password sont ok
        if ($username === 'test@example.com' && $password === '123456') {
            return new JsonResponse([
                'apiToken' => 'token_de_test',
                'roles' => ['ROLE_USER']
            ]);
        }

        return new JsonResponse(['error' => 'Identifiants invalides'], 401);
    }
}
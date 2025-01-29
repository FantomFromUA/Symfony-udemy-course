<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController extends AbstractController
{
    private array $messages = [
        ['message' => 'Hello', 'created' => '2025/01/29'],
        ['message' => 'Hi', 'created' => '2024/11/29'],
        ['message' => 'Good morning', 'created' => '2022/05/12'],
        ['message' => 'Bye!', 'created' => '2021/07/12'],
    ];

    #[Route('/messages/limit/{limit<\d>?3}', name: 'get_all_messages')]
    public function index($limit): Response
    {
        return $this->render(
            'Hello/index.html.twig',
            [
                'messages' => $this->messages,
                'limit' => $limit
            ]
        );
    }

    #[Route('/messages/{id<\d+>}', name: "get_one_message")]
    public function showOne($id): Response
    {
        return $this->render(
            'Hello/show_one.html.twig',
            [
                'message' => $this->messages[$id]
            ]
        );
    }
}

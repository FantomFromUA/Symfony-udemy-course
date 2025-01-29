<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController extends AbstractController
{
    private array $messages = [
        "Hello",
        "Hi",
        "Whats UP",
        "Bye!"
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

<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController
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
        return new Response(implode(', ', array_slice($this->messages, 0, $limit)));
    }

    #[Route('/messages/{id<\d+>}', name: "get_one_message")]
    public function showOne($id): Response
    {
        return new Response($this->messages[$id]);
    }
}

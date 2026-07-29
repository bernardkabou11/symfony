<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiTestController
{
    #[Route('/api/ping', name: 'api_ping')]
    public function ping(): Response
    {
        return new Response(json_encode(['status' => 'ok']), 200, [
            'Content-Type' => 'application/json'
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class ApiController
{
    private $attendeeRepository;
    /** @var SerializerInterface */
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function createApiRepsonse($data, int $statusCode = Response::HTTP_OK): Response
    {
        return new Response(
            $this->serializer->serialize($data, 'json'),
            $statusCode,
            [
                'Content-Type' => 'application/json',
            ]
        );
    }
}

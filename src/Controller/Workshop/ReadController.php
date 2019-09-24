<?php

declare(strict_types=1);

namespace App\Controller\Workshop;

use App\Controller\ApiController;
use App\Entity\Workshop;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/workshops/{id}", name="read_workshop", methods={"GET"})
 */
class ReadController extends ApiController
{
    public function __invoke(Workshop $workshop)
    {
        return $this->createApiRepsonse($workshop);
    }
}

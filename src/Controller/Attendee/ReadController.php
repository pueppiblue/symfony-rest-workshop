<?php

declare(strict_types=1);

namespace App\Controller\Attendee;

use App\Controller\ApiController;
use App\Entity\Attendee;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/attendees/{id}", name="read_attendee", methods={"GET"})
 */
class ReadController extends ApiController
{
    public function __invoke(Attendee $attendee)
    {
        return $this->createApiRepsonse($attendee);
    }
}

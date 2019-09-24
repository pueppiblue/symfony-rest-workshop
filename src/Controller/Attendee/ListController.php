<?php

declare(strict_types=1);

namespace App\Controller\Attendee;

use App\Controller\ApiController;
use App\Repository\AttendeeRepository;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/attendees", name="list_attendees", methods={"GET"})
 */
class ListController extends ApiController
{
    public function __invoke(AttendeeRepository $attendeeRepository)
    {
        $allAttendees = $attendeeRepository->findAll();

        return $this->createApiRepsonse($allAttendees);
    }
}

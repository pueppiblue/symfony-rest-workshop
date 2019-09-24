<?php

declare(strict_types=1);

namespace App\Controller\Workshop;

use App\Controller\ApiController;
use App\Repository\WorkshopRepository;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/workshops", name="list_workshops", methods={"GET"})
 */
class ListController extends ApiController
{
    public function __invoke(WorkshopRepository $workshopRepository)
    {
        $workshops = $workshopRepository->findAll();

        return $this->createApiRepsonse($workshops);
    }
}

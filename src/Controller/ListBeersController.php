<?php

namespace App\Controller;

use App\Serializer\ListBeersSerializer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\ListBeersRepository;

class ListBeersController
{
    private $listBeersRepository;

    public function __construct(ListBeersRepository $listBeersRepository)
    {
        $this->listBeersRepository = $listBeersRepository;
    }

    /**
     * @Route("/beers/list", name="api_list_beers_with_details", methods={"POST"})
     **/
    public function listBeers(): JsonResponse
    {
        $contents = $this->listBeersRepository->listBeers();

        $dataBeers = ListBeersSerializer::listBeersData(json_decode($contents));

        $response = new JsonResponse();
        $response->headers->set('Content-Type', 'application/json');
        $response->setData([
            'success' => true,
            'message' => 'Welcome',
            'dataBeers'     => $dataBeers,
        ]);

        return $response;
    }
}
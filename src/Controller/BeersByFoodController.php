<?php

namespace App\Controller;

use App\Repository\ListBeersRepository;
use App\Serializer\BeersByFoodSerializer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BeersByFoodController
{
    private $listBeersRepository;

    public function __construct(ListBeersRepository $listBeersRepository)
    {
        $this->listBeersRepository = $listBeersRepository;
    }

    /**
     * @Route("/beers_by_food", name="api_list_beers_by_food", methods={"POST"})
     */
    public function listBeersByFood(Request $request): JsonResponse
    {
        $foodUrl = $request->get('food');
        $contents = $this->listBeersRepository->listBeers('?food='.$foodUrl);

        $dataBeers = BeersByFoodSerializer::beersByFoodData(json_decode($contents));

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
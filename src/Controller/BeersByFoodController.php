<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BeersByFoodController
{
    const URL_BASE = 'https://api.punkapi.com/v2/beers';

    /**
     * @Route("/beers_by_food", name="api_list_beers_by_food", methods={"POST"})
     */
    public function listBeersByFood(Request $request): JsonResponse
    {
        $dataBeers = 'JERVEZA';
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
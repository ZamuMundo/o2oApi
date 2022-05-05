<?php

namespace App\Serializer;

class BeersByFoodSerializer
{
    public static function beersByFoodData(ARRAY $arrayData)
    {
        $dataBeers = [];
        foreach ($arrayData as $content)
        {
            $dataBeers[] = ([
                'id'            => $content->id,
                'name'          => $content->name,
                'description'   => $content->description,
            ]);
        }

        return $dataBeers;
    }
}
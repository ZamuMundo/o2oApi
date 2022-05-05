<?php

namespace App\Serializer;



class ListBeersSerializer
{
    public static function listBeersData(ARRAY $arrayData)
    {
        $dataBeers = [];
        foreach ($arrayData as $content)
        {
            $dataBeers[] = ([
                'id'            => $content->id,
                'name'          => $content->name,
                'description'   => $content->description,
                'image_url'     => $content->image_url,
                'tagline'       => $content->tagline,
                'first_brewed'     => $content->first_brewed,
            ]);
        }

        return $dataBeers;
    }
}
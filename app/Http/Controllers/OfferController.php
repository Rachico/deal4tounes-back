<?php

namespace App\Http\Controllers;

use App\Client;
use App\Offer;
use App\Repositories\OfferRepository;

class OfferController extends CrudController
{

    /**
     * OfferController constructor.
     * @param OfferRepository $offerRepository
     */

    public function __construct(OfferRepository $offerRepository)
    {
        $relations = [];
        $orderBy = [];
        $conditions = [];
        $nullConditions = [];
        $whereBetweenConditions = [];
        $selectedAttributes = ['*'];
        parent::__construct($offerRepository, $relations, $orderBy, $conditions, $nullConditions, $whereBetweenConditions, $selectedAttributes);
    }

    public function buyOffer($client_id,$offer_id)
    {
        $price = Offer::where('id',$offer_id)->first()->price;
        $client= Client::find($client_id);
        //return $price;
        //return $client->clientDetails->points;
        $client->clientDetails->points = $client->clientDetails->points - $price;
        $client->clientDetails->save();

        return ['message'=>'success','remaining'=>$client->clientDetails->points];
    }
}

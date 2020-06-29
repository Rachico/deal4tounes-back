<?php

namespace App\Http\Controllers;

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
}

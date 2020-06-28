<?php

namespace App\Repositories;

use App\Offer;

/**
 * Class OfferRepository
 * @package App\Repositories
 */
class OfferRepository extends CrudRepository
{
    /**
     * OfferRepository constructor.
     * @param Offer $offer
     */
    public function __construct(Offer $offer)
    {
        parent::__construct($offer);
    }
}

<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;

class ContactController extends CrudController
{

    /**
     * ContactController constructor.
     * @param ContactRepository $contactRepository
     */

    public function __construct(ContactRepository $contactRepository)
    {
        $relations = [];
        $orderBy = [];
        $conditions = [];
        $nullConditions = [];
        $whereBetweenConditions = [];
        $selectedAttributes = ['*'];
        parent::__construct($contactRepository, $relations, $orderBy, $conditions, $nullConditions, $whereBetweenConditions, $selectedAttributes);
    }

}

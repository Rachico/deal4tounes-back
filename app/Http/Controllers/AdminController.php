<?php

namespace App\Http\Controllers;

use App\Repositories\AdminRepository;

class AdminController extends CrudController
{

    /**
     * AdminController constructor.
     * @param AdminRepository $adminRepository
     */

    public function __construct(AdminRepository $adminRepository)
    {
        $relations = [];
        $orderBy = [];
        $conditions = [];
        $nullConditions = [];
        $whereBetweenConditions = [];
        $selectedAttributes = ['*'];
        parent::__construct($adminRepository, $relations, $orderBy, $conditions, $nullConditions, $whereBetweenConditions, $selectedAttributes);
    }
}

<?php

namespace App\Repositories;

use App\Contact;

/**
 * Class ContactRepository
 * @package App\Repositories
 */
class ContactRepository extends CrudRepository
{
    /**
     * ContactRepository constructor.
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        parent::__construct($contact);
    }
}

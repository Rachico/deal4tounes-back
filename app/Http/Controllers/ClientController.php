<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientDetails;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientController extends CrudController
{

    /**
     * ClientController constructor.
     * @param ClientRepository $clientRepository
     */

    public function __construct(ClientRepository $clientRepository)
    {
        $relations = ['clientDetails'];
        $orderBy = [];
        $conditions = [];
        $nullConditions = [];
        $whereBetweenConditions = [];
        $selectedAttributes = ['*'];
        parent::__construct($clientRepository, $relations, $orderBy, $conditions, $nullConditions, $whereBetweenConditions, $selectedAttributes);
    }


    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     * @throws \Exception
     */
    public function store(Request $request)
    {
        if ($request->name == '') {
            return response()->json([
                'error' => 'le champ nom  est obligatoire !'
            ], 403);
        }

        if ($request->email == '') {
            return response()->json([
                'error' => 'le champ email  est obligatoire !'
            ], 403);
        }

        if ($request->password == '') {
            return response()->json([
                'error' => 'le champ password  est obligatoire !'
            ], 403);
        }

        $client = new Client([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $clientDetails = [
            'date_of_Birth' => $request->date_of_Birth,
            'address' => $request->address,
            'motorized'=> $request->motorized,
            'points'=> $request->points,
            'phone' => $request->phone,
        ];


        DB::beginTransaction(); //Start transaction!

        try {
            //saving logic here
            $client->save();
            $client->clientDetails()->create($clientDetails);
            DB::commit();
            return response()->json([
                'message' => 'Successfully created user!'
            ], 201);
        } catch (\Exception $e) {
            //failed logic here
            DB::rollback();
            throw $e;

        }
    }

}

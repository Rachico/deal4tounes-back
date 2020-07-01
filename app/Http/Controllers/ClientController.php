<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientDetails;
use App\Repositories\ClientRepository;
use Carbon\Carbon;
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
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'phone' => $request->phone,
            'city'=>$request->city,
            'zip_code'=>$request->zip_code,
        ];


        DB::beginTransaction(); //Start transaction!

        try {
            //saving logic here
            $client->save();
            $client->clientDetails()->create($clientDetails);
            $tokenResult = $client->createToken('Personal Access Token');
            $token = $tokenResult->token;
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
            DB::commit();
            return response()->json([
                'message' => 'Successfully created user and logged in',
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
            ], 201);
        } catch (\Exception $e) {
            //failed logic here
            DB::rollback();
            throw $e;

        }
    }

    public function getAllClients()
    {
        $clients = Client::all();
        return ['clients'=>$clients];
    }

}

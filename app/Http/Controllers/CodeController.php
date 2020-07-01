<?php

namespace App\Http\Controllers;

use App\Client;
use App\Code;
use Illuminate\Http\Request;

class CodeController extends Controller
{

    public function setPoints($client_id,$code_id)
    {
        $points = Code::where('id',$code_id)->first()->points;
        $client= Client::find($client_id);
        //dd($client->clientDetails->points);
        $client->clientDetails->points = $points;
        $client->clientDetails->save();
        return ['message'=>'success'];
    }



}

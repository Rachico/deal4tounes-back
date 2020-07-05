<?php

namespace App\Http\Controllers;
use App\Action ;
use App\User ;
use App\Comment ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class ActionController extends Controller
{
    public function store(Request $request){

        $validatedData =$request ->validate ([
            'title'=>'required' ,
            'body'=> 'required',
            'address'=>'required',
            ]);


            $action = new Action;
            $action['title']=$request->input('title');
            $action['body']=$request->input('body');
            $action['address']=$request->input('address');
            $action['User_id']=$request->user()->getId();
            $action->save();

            return response ([
                'action'=>$action,

             'message' => 'Successfully created action!'
            ]);


    }

    public function display(){
        $actions=Action ::orderBy('created_at','desc')->get();

    return ['Actions' => $actions ] ;

    }
    public function commentStore($id,Request $request){

        $action_id =  $id  ;

        $comment= \DB::table('comments')
     ->where ('Action_id',$action_id)
     ->where ('User_id',Auth::user()->id)
     ->first();
     $new_comment=new Comment ;
     $new_comment->Action_id =$action_id;
     $new_comment->User_id=Auth::user()->id ;
     $new_comment->text=$request->input('text');
     $new_comment->save();
     $response=array(
        'comment'=>$new_comment,
    );

    return response ([$response,200]);
}
public function displayComments(){
    $comments=Comment ::orderBy('created_at','desc')->get();

return ['Comments' => $comments ] ;

}

public function addressList()
{
    return Action::all()->pluck('address');
}

public function getActionByAddress($address)
{
    return Action::where('address',$address)->get();
}
}

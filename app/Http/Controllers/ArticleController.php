<?php

namespace App\Http\Controllers;
use App\Http\AuthController ;
use Illuminate\Http\Request;
use App\Article ;
use App\Like ;
use App\User ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class ArticleController extends Controller
{
 
 public function store(Request $request){
   $validatedData =$request ->validate ([

        'title'=>'required' ,
        'subheader'=>'required',
        'Typography'=> 'required',
        'TypographyParagraph'=> 'required',
        'moreIcon'=> 'required',
        'avatar'=>'image|nullable|max:1999',
        'content_image'=>'image|nullable|max:1999'
         ]);

   
 // Handle File Upload
 if($request->hasFile('avatar')){
    // Get filename with the extension
    $filenameWithExt = $request->file('avatar')->getClientOriginalName();
    // Get just filename
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    // Get just ext
    $extension = $request->file('avatar')->getClientOriginalExtension();
    // Filename to store
    $fileNameToStore= $filename.'_'.time().'.'.$extension;
    // Upload Image
    $path = $request->file('avatar')->move(public_path("/"), $fileNameToStore);
    $photoURL=url('/'.$fileNameToStore);
} else {
    $photoURL = 'noimage1.jpg';
}

  // Handle File Upload
  if($request->hasFile('content_image')){
    // Get filename with the extension
    $filenameWithExt1 = $request->file('content_image')->getClientOriginalName();
    // Get just filename
    $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);
    // Get just ext
    $extension1 = $request->file('content_image')->getClientOriginalExtension();
    // Filename to store
    $fileNameToStore1= $filename1.'_'.time().'.'.$extension1;
    // Upload Image
    $path1 = $request->file('content_image')->move(public_path("/"), $fileNameToStore1);
    $photoURL1=url('/'.$fileNameToStore1);
} else {
    $photoURL1 = 'noimage1.jpg';
}  


  $article = new Article;  
 

  
   
  

   $article['title']=$request->input('title');
  
   $article['subheader']=$request->input('subheader');
 $article['Typography']=$request->input('Typography');
   $article['TypographyParagraph']=$request->input('TypographyParagraph');
   $article['moreIcon']=$request->input('moreIcon');
   $article['User_id']=$request->user()->getId();
   $article['avatar'] = $photoURL ;
   $article['content_image'] = $photoURL1;
   $article->save();
   return response ([
        'article'=>$article,
    
     'message' => 'Successfully created article!'
    ]);
 }
 
 
    public function display(){
        $articles=Article ::orderBy('created_at','desc')->get();
      
    return ['Articles' => $articles ] ;

    }
    public function like($id,Request $request){

        $like_s=$request->like_s ;
        $article_id = $id ;
       $like= \DB::table('likes')
    ->where ('Article_id',$article_id)
    ->where ('User_id',Auth::user()->id)
    ->first();
    if (!$like)
    {
        $new_like=new Like ;
        $new_like->Article_id =$article_id;
        $new_like->User_id=Auth::user()->id ;   
        $new_like->like=1;
        $new_like->save();
        $is_like=1;
    }
    elseif ($like->like==1)
    {   
        \DB::table('likes')
        ->where ('Article_id',$article_id)
        ->where ('User_id',Auth::user()->id)
        ->delete();
        $is_like=0;
    }
    elseif($like->like==0)
   {      
        \DB::table('likes')
        ->where ('Article_id',$article_id)
        ->where ('User_id',Auth::user()->id)
        ->update(['like' => 1]);
        $is_like=1;
    }   
    
       
       $response=array(
            'is_like'=>$is_like,
        );
   
        return response ([$response,200]);
       
       
        
}

}
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MyController extends Controller
{
     public function index(){
         $posts=Post::paginate(6);
         return view('home')->with([
             'posts'=>$posts
         ]);
     }

     public function show($slug){
        $post=Post::where('id',$slug)->first();
        return view('show')->with([
            'post'=>$post
        ]);
     }

     public function ajouter(Request $request) {
      if($request->has('image')){
          $file=$request->image;
          $image_name=time().'_'.$file->getClientOriginalName();
          $file->move(public_path('uploads'),$image_name);
      }
      Post::create([
          'title'=>$request->title,
          'body'=>$request->body,
           'image'=>$image_name,
           'slug'=>Str::slug($request->title),
           'user_id'=>auth()->user()->id
      ]);
      return redirect()->route('Home')->with([
          'success'=>"l ajout est bien affectué"
      ]);
     }

     public function UpdatePage($id) {
         $post=Post::find($id);
        return view('update')->with([
            "post"=>$post
        ]);
     }

     public function modifier($id,Request $request) {
        $post=Post::where("id",$id)->first();
        if($request->has('image')){
            $file=$request->image;
            $image_name=time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'),$image_name);
            unlink(public_path('uploads').'/'.$post->image);
        }
        $post->update([
            'title'=>$request->title,
            'body'=>$request->body,
            'image'=>$image_name,
            'slug'=>Str::slug($request->title),
            'user_id'=>auth()->user()->id
        ]);
        return redirect()->route('Home')->with([
            "success"=>'la modification est bien réussie'
        ]);
     }

     public function supprimer($id,Request $request) {
        $post=Post::where("id",$id)->first();
        //bach nmsa7 l9dima mn uploads 3ad nhat jedida
        unlink(public_path('uploads').'/'.$post->image);
        $post->delete();
        return redirect()->route('Home')->with([
            "success"=>'la suppression est bien réussie'
        ]);
     }
}

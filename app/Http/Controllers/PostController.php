<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    use ApiResponser;

    public function indexs(){
        $posts=Post::all();
        return $this->successResponse($posts);
    }

    public function stores(Request $request){
        $rules=[
            'name'=>'required|max:255',
            'slug'=>'required|max:255'
        ];
        //$this->validate($request,$rules);
        $post=Post::create($request->all());
        return $this->successResponse($post,Response::HTTP_CREATED);
    }

    public function updates(Request $request,$post){
        $rules=[
            'name'=>'required|max:255',
            'slug'=>'required|max:255'
        ];
        //$this->validate($request,$rules);
        $post=Post::findOrFail($post);
        $post->fill($request->all());
        if($post->isClean()){
            return $this->errorResponse('Al menos un campo debe cambiar',Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $post->save();
        return $this->successResponse($post, Response::HTTP_CREATED);
    }

    public function shows($post){
        $post=Post::findOrFail($post);
        return $this->successResponse($post);
    }

    public function destroys($post){
        $post=Post::findOrFail($post);
        $post->delete();
        return $this->successResponse($post);
    }
}

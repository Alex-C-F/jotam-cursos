<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
	public function getIndex(){
		$posts = Post::paginate(4);
		return view('informacoes.index')->withPosts($posts);
	}

    public function getSingle($slug){
    	//fetch from the based on slug
    	$post = Post::where('slug','=',$slug)->first();
    	//return $post->slug;
    	return view('informacoes.single')->withPost($post);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.home.index')
            ->with('posts', Post::orderBy('created_at', 'DESC')->where('lang', app()->getLocale())->paginate(10)); 
    }

    public function show($slug){
        $post = Post::where('slug',$slug)->first();
        return view('frontend.home.show')->with('post', $post);
    }
}

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::all()->count();
        $post = Post::all()->count();
        $delete = Post::all()->whereNotNull('deleted_at');
        return view('backend.dashboard.index')->with('user', $user)->with('post', $post)->with('delete', $delete);
    }
}

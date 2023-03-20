<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::all()->count();
        $post = Post::all()->count();
        $delete = DB::table('posts')->whereNotNull('deleted_at')->count();
        $percentage =    ($delete * 100)/$post ;
        return view('backend.dashboard.index')->with('user', $user)->with('post', $post)->with('delete', $delete)->with('percentage', $percentage);
    }
}

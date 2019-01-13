<?php

namespace App\Http\Controllers;

use Modules\Blog\Entities\Post;
use Modules\Category\Entities\Category;
use Modules\Tag\Entities\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(){
        $postCount = Post::count();
        $categoryCount = Category::count();
        $tagCount = Tag::count();
        return view('dashboard', compact('postCount', 'categoryCount', 'tagCount'));
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('index', [
        'posts' => Post::latest()->get(),
    ]);
    }
    public function about()
    {
        return view('pages.about');
    }
    public function damon()
    {
        return view('pages.damon');
    }
    public function uncover()
    {
        return view('pages.uncover');
    }
     public function privacy()
    {
        return view('pages.privacy');
    }
     public function terms()
    {
        return view('pages.terms');
    }
}

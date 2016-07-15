<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Blogs;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware(['guest', 'auth']);
    }

    /**
     * main page
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Blogs $blog)
    {
        
        $lists = $blog->listPost();
        $recents = $blog->take(5)->get();
        return view('index')
            ->with('lists', $lists)
            ->with('recents', $recents);
    }
}

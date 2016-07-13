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
        //dd($user->find(2)->profile->id);
        //
        $lists = $blog->listPost();
        $recents = $blog->take(5)->get();

      //  dd($lists);

        return view('index')
            ->with('lists', $lists)
            ->with('recents', $recents);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Blogs;

class HomeController extends Controller
{
    private $blogs;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Blogs $blogs)
    {
     //   $this->middleware(['guest', 'auth']);
        $this->blogs = $blogs;
    }

    /**
     * main page
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        
        $lists = $this->blogs->listPost($this->blogs);
        $recents = $lists->take(5);

        return view('index')
            ->with('lists', $lists)
            ->with('recents', $recents);

    }

    public function getShow($title)
    {
        
        $links = $this->blogs->findTitle($this->blogs, $title);

        $disqus = array(
            'shortname' => env('DISQUS_SHORTNAME'),
            'title' =>  $links->title,
            'identifier' => $links->scopeTitle($links->title)
        );

       return view('show')
            ->with('links', $links)
            ->with('disqus', $disqus);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Settings;
use Illuminate\Pagination\Paginator;
use DB;

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
    public function index(Settings $settings)
    {
       // dd($settings->test('site_name'));
        
        $lists = $this->blogs->listPost($this->blogs);
        $recents = $lists->take(5);
        $page = DB::table('blogs')->paginate(4);
 
        return view('index')
            ->with('lists', $lists)
            ->with('recents', $recents)
            ->with('page', $page);

    }

    public function getShow($title)
    {
        $links = $this->blogs->findTitle($this->blogs, $title);

        //dd($links->title);

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

<?php

namespace App\Http\Controllers\Admin\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Validator;

class AdminBlogController extends Controller
{
    protected $blog;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Blogs $blog)
    {
        $this->middleware(['auth', 'admin']);
        $this->blog = $blog;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->blog->listPost($this->blog);

        return view('admin.blog.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),array(
            'title'         =>  'required',
            'content'       =>  'required'
        ));

        if($validation->fails()) {

            $errors = $validation->errors();
            $errors =  json_decode($errors);

            return response()->json([
                'success' => false,
                'status' => $errors
            ], 422);
        }
            $this->blog->create($request->all());

        return response()->json([
            'success' => true,
            'status' => 'Create Post Success'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = $this->blog->find($id);

        return view('admin.blog.edit')->with('posts', $posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $this->blog->find($id);

        $post->update($request->all());

        return response()->json([
            'status' => 'Success Post updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if (!$this->blog->destroy($id)) {
            return redirect()->route('blog.index')->with('status', 'error Deleted');
        }

        return response()->json(['status' => 'Sucess Blog Deleted',
           'id' => $id]);
    }
}

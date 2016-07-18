<?php

namespace App\Http\Controllers\Admin\Setting;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Settings;

class AdminSettingController extends Controller
{
    protected $settings;

    /**
     * AdminController constructor.
     * middleware auth admin
     */
    public function __construct(Settings $settings)
    {
           $this->middleware(['auth', 'admin']);
           $this->settings = $settings;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $values = $this->settings->all();
        return view('admin.setting.sitecreate')->with('values', $values);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $arr = $request->except(['_token', 'id', '_method']);

        foreach ($arr as $key => $value)
        {
          $this->settings->setSetting($key, $value);
        }

        return redirect()->route('admin_setting.create')->with('status', 'Setting update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

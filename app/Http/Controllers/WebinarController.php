<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Webinar;
use DB;
class WebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webinars = Webinar::all();
        return view('admin.webinar.index',compact('webinars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.webinar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'webinar_name' => 'required',
            'price' => 'required',
            'flyer' => 'required|mimes:jpg,png'
        ]);

        return $request;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $webinardetail = DB::table('webinar_participants')
                        ->join('users','webinar_participants.user_id','=','users.id')
                        //->groupBy('webinar_participants.user_id')
                        ->where('webinar_participants.webinar_id','=',$id)
                        ->paginate(10);
        //return $webinardetail;
        return view('admin.webinar.detail',compact('webinardetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

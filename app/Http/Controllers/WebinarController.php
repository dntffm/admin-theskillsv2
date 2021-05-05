<?php

namespace App\Http\Controllers;
use App\Webinar;
use Illuminate\Http\Request;
class WebinarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getAll()
    {
        return Webinar::all();
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "webinar_name" => 'required',
            "description" => 'required',
            'price' => 'required',
            'flyer' => 'required',
            'closed_at' => 'required',
        ]);

        if(Webinar::create($request->all())){
            return response()->json(['message' => 'webinar berhasil disimpan'],200);
        }
        return response()->json(['message' => 'webinar gagal disimpan'],00);
    }

    public function registerWebinar(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'webinar_id' => 'required'
        ]);

        
    }
}

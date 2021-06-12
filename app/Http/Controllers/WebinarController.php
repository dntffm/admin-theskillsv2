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
        $webinars = Webinar::orderBy('created_at','desc')->paginate(10);
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
            'closed_at' => 'required',
            'description' => 'required',
            'flyer' => 'required|mimes:jpg,png'
        ]);
        
        $flyer = time().$request->file('flyer')->getClientOriginalName();
        $path = $request->file('flyer')->storeAs(
            'public/img', $flyer
        );


        $webinar = new Webinar;

        $webinar->webinar_name = $request->webinar_name;
        $webinar->price = $request->price;
        $webinar->closed_at = $request->closed_at;
        $webinar->flyer = $request->flyer;
        $webinar->link_webinar = $request->link_webinar;
        $webinar->description = $request->description;
        $webinar->link_record = \json_encode( $request->link_record);
        $webinar->status = $request->status == 'on' ? 'on' : 'off';
        $webinar->flyer = $flyer;


        if($webinar->save()){
            return redirect()->route('admin.webinar')->with('message-success','Tambah webinar berhasil!!');
        }
        return redirect()->route('admin.webinar')->with('message-fail','Tambah webinar gagal!!');
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
        $webinar = Webinar::find($id);
        return view('admin.webinar.edit', compact('webinar'));
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
        $webinar = Webinar::find($id);
        
        $webinar->flyer = $webinar->flyer;
        
        if($request->file('flyer')){
            $flyer = time().$request->file('flyer')->getClientOriginalName();
            $path = $request->file('flyer')->storeAs(
                'public/img', $flyer
            );

            $webinar->flyer = $flyer;
        }

        $webinar->webinar_name = $request->webinar_name;
        $webinar->price = $request->price;
        $webinar->closed_at = $request->closed_at;
        $webinar->link_webinar = $request->link_webinar;
        $webinar->description = $request->description;
        $webinar->link_record = \json_encode( $request->link_record);
        $webinar->status = $request->status == 'on' ? 'on' : 'off';

        if($webinar->save()){
            return redirect()->route('admin.webinar')->with('message-success','Ubah webinar berhasil!!');
        }
        return redirect()->route('admin.webinar')->with('message-fail','Ubah webinar gagal!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $webinar = Webinar::find($id);

        if($webinar->delete())
        {
            return redirect()->back()->with('message-success','Hapus webinar berhasil!!');
        }
        return redirect()->back()->with('message-fail','Hapus webinar gagal!!');
    }
}

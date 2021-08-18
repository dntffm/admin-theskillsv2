<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Minicourse;

class MinicourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function index()
    {
        $data = Minicourse::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.subabcourse.index', compact('data'));
    }

    public function create()
    {
        return view('admin.subabcourse.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'minicourse_name' => 'required',
            'mc_thumbnail' => 'required',
            'subcourse_id' => 'required',
            'description' => 'required'
        ]);
        
        $minicourse = new Minicourse;

        $minicourse->minicourse_name = $request->minicourse_name;
        $minicourse->link_video = $request->link_video;
        $minicourse->link_doc = $request->link_doc;
        $minicourse->link_other_resource = $request->link_other;
        $minicourse->mc_thumbnail = $request->mc_thumbnail;
        $minicourse->subcourse_id = $request->subcourse_id;
        $minicourse->description = $request->description;

        if($minicourse->save()) {

            return redirect('minicourse')->with('message-success', 'SubBab course berhasil disimpan');
        }
        return redirect('minicourse')->with('message-fail', 'Gagal menyimpan');
       
    }

    public function showByCourse($courseid)
    {
        return Minicourse::where('subcourse_id',$courseid)->get();
    }
    public function showById($id)
    {
        return Minicourse::find($id);
    }
    
    public function destroy($id)
    {
        $minicourse = Minicourse::where('id', $id)->firstOrFail();

        if($minicourse->delete()) {
            return redirect('minicourse')->with('message-success', 'SubBab course berhasil dihapus');
        }
        return redirect('minicourse')->with('message-fail', 'SubBab course gagal dihapus');
    }

    public function edit($id)
    {
        $minicourse = Minicourse::where('id', $id)->firstOrFail();

        return view('admin.subabcourse.edit', compact('minicourse'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request,[
            'minicourse_name' => 'required',
            'subcourse_id' => 'required',
            'description' => 'required'
        ]);
        
        $minicourse = Minicourse::where('id', $id)->firstOrFail();
        $minicourse->mc_thumbnail = $minicourse->mc_thumbnail;

        if($request->file('mc_thumbnail')){
            $flyer = time().$request->file('mc_thumbnail')->getClientOriginalName();
            $path = $request->file('mc_thumbnail')->storeAs(
                'public/img', $flyer
            );

            $minicourse->mc_thumbnail = $flyer;
        }

        $minicourse->minicourse_name = $request->minicourse_name;
        $minicourse->link_video = $request->link_video;
        $minicourse->link_doc = $request->link_doc;
        $minicourse->link_other_resource = $request->link_other;
        $minicourse->subcourse_id = $request->subcourse_id;
        $minicourse->description = $request->description;

        if($minicourse->save()) {

            return redirect('minicourse')->with('message-success', 'SubBab course berhasil diubah');
        }
        return redirect('minicourse')->with('message-fail', 'Gagal mengubah');  
    }
}

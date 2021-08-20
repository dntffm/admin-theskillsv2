<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.schedule.index', compact('schedules'));
    }

    public function store(Request $request)
    {
        $date = date('l, d-m-Y h:i' ,strtotime($request->time)) ;
        
        $schedule = new Schedule();
        $schedule->date = $date;
        $schedule->link = $request->link;
        $schedule->subcourse_id = $request->subcourse_id;
        if($schedule->save()) {
            return redirect('schedule')->with('message-success', 'berhasil tambah jadwal');
        }
        return redirect('schedule')->with('message-fail', 'gagal tambah jadwal');

    }

    public function create()
    {
        return view('admin.schedule.create');
    }

    public function destroy($id)
    {
        $schedule = Schedule::where('id', $id)->first();

        if($schedule->delete()) {
            return redirect('schedule')->with('message-success', 'Berhasil menghapus');
        }
        return redirect('schedule')->with('message-fail', 'gagal menghapus');
    }
}

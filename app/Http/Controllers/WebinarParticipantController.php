<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebinarParticipant;
class WebinarParticipantController extends Controller
{
    public function updateApprovalStatus($id, Request $request)
    {
        $participant = WebinarParticipant::find($id);
        
        $participant->approval_status = $request->status;

        if($participant->save())
        {
            return redirect()->back()->with('message','Ganti status berhasil!!');
        }
        return $participant;
    }
}

<?php

namespace fms\Http\Controllers;

use Illuminate\Http\Request;
use fms\Profile;
use Sentinel;
use fms\Matter;


class MatterCtrl extends Controller
{
    public function index()
    {
        $advocates = Profile::where('designation', 'advocate')->get();

        return view('system.matters.new', compact('advocates'));
    }

    public function newMatter(Request $request)
    {
        $user =  Sentinel::getUser()->email;
        $matter = new Matter();

        $matter->matter_name  = $request->input('matter_name');
        $matter->matter_type = $request->input('matter_type');
        $matter->counsel_incharge = $request->input('counsel_incharge');
        $matter->opposing_counsel = $request->input('opposing_counsel');
        $matter->file_date = $request->input('file_date');
        $matter->client_name = $request->input('client_name');
        $matter->client_email = $request->input('client_email');
        $matter->client_mobile = $request->input('client_mobile');
        $matter->matter_status = $request->input('matter_status');
        $matter->created_by = $user;
        $matter->student_incharge = $request->input('student_incharge');
        $matter->clerk_incharge = $request->input('clerk_incharge');
        $matter->save();

        return redirect()->back();
    }

    public function viewMatters()
    {
      $matters = Matter::simplePaginate('10');

      return view('system.matters.view', compact('matters'));
    }

    public function viewMatter($id)
    {
      $matter = Matter::findOrFail($id);

      return view('system.matters.view-matter', compact('matter'));
    }

    public function destroy($id)
    {
      $matter = Matter::findOrFail($id);
      $matter->delete();

      return redirect()->back();
    }
}

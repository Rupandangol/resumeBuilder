<?php

namespace App\Http\Controllers;

use App\Model\Backend\Admin;
use App\Model\PersonalDetail;
use Illuminate\Http\Request;

class backendController extends Controller
{
    public function dashboard()
    {
        return view('Backend.pages.dashboard');
    }

    public function addAdmin()
    {
        return view('Backend.pages.addAdmin');
    }

    public function addAdminAction(Request $request)
    {

        $this->validate($request, [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed'
        ]);
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        if (Admin::create($data)) {

            return redirect(route('manageAdmin'));
        }
        return redirect()->back()->with('fail', 'failed');

    }

    public function manageAdmin()
    {
        $data['admin'] = Admin::all();
        return view('Backend.pages.manageAdmin', $data);
    }

    public function viewInfo()
    {
        $data['details'] = PersonalDetail::all();
        return view('Backend.pages.viewInfo', $data);
    }

    public function details($id){
        $data['details']=PersonalDetail::find($id);
        return view('Backend.pages.detailsInfo',$data);
    }

}

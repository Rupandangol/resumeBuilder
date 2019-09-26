<?php

namespace App\Http\Controllers;

use App\ExportView;
use App\Model\Backend\Admin;
use App\Model\PersonalDetail;
use Faker\Provider\Person;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class backendController extends Controller
{

    public function addAdmin()
    {
        $admin_active='active';
        $admin_active1='active';
        return view('Backend.pages.addAdmin',compact('admin_active', 'admin_active1'));
    }

    public function addAdminAction(Request $request)
    {

        $this->validate($request, [
            'username' => 'required|min:4|unique:admins,username',
            'email' => 'required|unique:admins,email',
            'password' => [
                'required',
                'min:5',
                'confirmed',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/'
            ]
        ]);
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['status']=0;
        $data['privileges'] = $request->privileges;
        $data['password'] = bcrypt($request->password);
        if (Admin::create($data)) {

            return redirect(route('manageAdmin'));
        }
        return redirect()->back()->with('fail', 'failed');

    }

    public function manageAdmin()
    {
        $admin_active='active';
        $admin_active2='active';
        $data['admin'] = Admin::all();
        return view('Backend.pages.manageAdmin', $data,compact('admin_active','admin_active2'));
    }


    public function deleteAdmin($id){
        Admin::find($id)->delete();
        return redirect()->back()->with('danger','Admin Deleted');
    }
    public function updateAdmin($id){
        $data['item']=Admin::find($id);
        return view('Backend.pages.updateAdmin',$data);
    }

    public function updateAdminAction(Request $request,$id){
        $this->validate($request,[
            'username'=>'required',
            'email'=>'required',
            'password'=>'required|confirmed'
        ]);
        $data['username']=$request->username;
        $data['email']=$request->email;
        $data['privileges']=$request->privileges;
        $data['status']=0;
        $data['password']=bcrypt($request->password);
        if(Admin::find($id)->update($data)){
            return redirect(route('manageAdmin'))->with('success','Admin Updated');
        }

    }



    public function viewInfo()
    {
        $data_active='active';
        $data_active1='active';
        $data['details'] = PersonalDetail::all();
        return view('Backend.pages.viewInfo', $data,compact('data_active','data_active1'));
    }
    public function fullData(){
        $data_active='active';
        $data_active2='active';
        $data['details']=PersonalDetail::all();
        return view('Backend.pages.fullData',$data,compact('data_active2','data_active'));
    }



    public function details($id){
        $data['details']=PersonalDetail::find($id);
        return view('Backend.pages.detailsInfo',$data);
    }
    public function profileDelete($id){
        PersonalDetail::find($id)->delete();
        return redirect(route('viewInfo'));
    }
    public function excelD(){
        $data =Admin::get()->toArray();

        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('invoices.xlsx');
    }

//    public function excelD()
//    {
//        return Excel::download(new ExportView(), 'invoices.xlsx');
//    }

}

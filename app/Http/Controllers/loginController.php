<?php

namespace App\Http\Controllers;

use App\Mail\forgetPassword;
use App\Model\Backend\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class loginController extends Controller
{
    public function login()
    {
        return view('Backend.pages.login');
    }

    public function loginAction(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        $username = $request->username;
        $password = $request->password;
        $rememberMe = isset($request->remember_me);

        if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password, 'status' => 1], $rememberMe)) {
            return redirect()->intended(route('admin-dashboard'));
        }
        return redirect()->back()->with('fail', 'Invalid Credentials');
    }

    public function logoutAdmin()
    {
        Auth::guard('admin')->logout();
        return redirect(route('loginAdmin'));
    }

    public function resetLink()
    {
        return view('Backend.pages.resetLink');
    }

    public function resetLinkPost(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);
        $email = $request->email;
        $data = Admin::where('email', $email)->first();
        if ($data) {
            Mail::to($request->email)->send(new forgetPassword($email));
            return view('Backend.pages.resetLinkSent');
        } else {
            return redirect()->back()->with('failEmail', 'Wrong Email');
        }
    }

    public function reset($token = null)
    {
        if ($admin = Admin::where(['reset_token' => $token])->first()) {
            return view('Backend.pages.reset', compact('token'));
        }else{
            return view('Backend.pages.login');
        }
    }

    public function resetPost(Request $request, $token = null)
    {
        if ($token) {
            $this->validate($request, [
                'password' => 'required|confirmed'
            ]);
            $admin = Admin::where(['reset_token' => $token])->first();

            $password = bcrypt($request->password);
            Admin::where(['reset_token' => $token])->update(['password' => $password]);

            return redirect(route('loginAdmin'))->with('password', 'Password Reset Done');
        }

    }
}

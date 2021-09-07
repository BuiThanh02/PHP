<?php


namespace App\Http\Controllers;
use http\Client\Curl\User;
use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UsersController extends BaseController
{
    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'matkhau' => 'required'
            ]
        );

        $canLoginAsAdmin = Auth::attempt([
            'email' => $request->input('email'),
            'matkhau' => $request->input('matkhau'),
            'role' => '1'
        ]);

        $canLoginAsUser = Auth::attempt([
            'email' => $request->input('email'),
            'matkhau' => $request->input('matkhau'),
            'role' => '2'
        ]);

        if ($canLoginAsAdmin)
        {
            return redirect('/front/admin');
        }
        elseif ($canLoginAsUser)
        {
            return redirect('/front/thongtin' . Auth::user()->id);
        }
        else
        {
            return redirect()->back();
        }

    }

    public function Users(Request $request)
    {
        $request->validate(
            [
                'CMND' => 'required',
                'ten' => 'required',
                'birthday' => 'required',
                'diachi' => 'required',
                'SDT' => 'required|numeric',
                'tienxu' => 'required',
                'email' => 'required',
                'matkhau' => 'required',
            ]
        );

        $user = User::create([
            'CMND' => $request->input('CMND'),
            'ten' => $request->input('ten'),
            'birthday' => $request->input('birthday'),
            'diachi' => $request->input('diachi'),
            'SDT' => $request->input('SDT'),
            'tienxe' => $request->input('tienxu'),
            'email' => $request->input('email'),
            'matkhau' => $request->input('matkhau'),
            'role' => '2'
        ]);

        if ($user) {
            return redirect('/front/dangnhap');
        }
    }
    public function User()
    {
        $users = User::where('role', 2)->get();
        return view('/front/thongtin', [
            'users' => $users
        ]);
    }

    public function Admin()
    {
        $users = User::where('role', 1)->get();
        return view('/front/admin', [
            'users' => $users
        ]);
    }

    public function ShowLogin()
    {
        return view('/front/dangky');
    }

    public function ShowRegister()
    {
        return view('/front/dangnhap');
    }


}

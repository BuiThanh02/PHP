<?php


namespace App\Http\Controllers;
use http\Client\Curl\User;
use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;


class ListController extends BaseController
{
    public function VaccinationList(Request $request)
    {
        $request->validate(
            [
                'CMND' => 'required',
                'ten' => 'required',
                'birthday' => 'required',
                'diachi' => 'required',
                'SDT' => 'required|numeric',
                'tienxu' => 'required',
            ]
        );

        $list = User::create([
            'CMND' => $request->input('CMND'),
            'ten' => $request->input('ten'),
            'birthday' => $request->input('birthday'),
            'diachi' => $request->input('diachi'),
            'SDT' => $request->input('SDT'),
            'tienxu' => $request->input('tienxu'),
        ]);

        if ($list) {
            return redirect('/front/tracuu');
        }
    }
    public function ShowVaccination()
    {
        return view('/front/dangkytiem');
    }
    public function Showtracuu()
    {
        return view('/front/tracuu');
    }
    public function TraCuu(Request $request)
    {
        $request->validate(
            [
                'CMND' => 'required',
            ]
        );
        $infor = Auth::attempt([
            'CMND' => $request->input('CMND'),
        ]);
        $CMND = DB::table('vaccination_list')->select('CMND')->get();
            if ('CMND' == $CMND){
                return view('thongtintc' . Auth::user()->CMND);
            };
        if ($infor) {
            return redirect('/front/tracuu');
        }
    }
}

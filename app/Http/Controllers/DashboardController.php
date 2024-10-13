<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {

        $auth_id = Auth::user()->id;
        $data['tagihanBelumLunas'] = User::whereHas('siswa', function ($query) {
            $query->whereHas('tagihans', function ($tagihan) {
                $tagihan->whereStatus('Belum Lunas');
            });
        })->with('siswa.tagihans',function($query){
            $query->whereStatus('Belum Lunas');
        })
        ->find($auth_id);
        // dd($data);
        // $data = Tagihan::with('siswa.user')->whereStatus('Belum Lunas')->count();
        // ->whereSiswaId($user_id)->whereStatus('Belum lunas')->count();


        // dd($data, $user_id);
        return view('admin.admin-dashboard', $data);
    }
}

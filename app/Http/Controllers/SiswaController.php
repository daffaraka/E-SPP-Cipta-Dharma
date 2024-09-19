<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{

    public function index()
    {
        $data['judul'] = 'Data Siswa';
        $data['siswa'] = Siswa::all();

        return view('admin.siswa.siswa-index',compact('siswa'));
    }


    public function create()
    {
        return view('admin.siswa.siswa-create');
    }


    public function store(Request $request)
    {
        $validators = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
        ]);


    }


    public function show(Siswa $siswa)
    {
        //
    }


    public function edit(Siswa $siswa)
    {
        //
    }
    public function update(Request $request, Siswa $siswa)
    {
        //
    }


    public function destroy(Siswa $siswa)
    {
        //
    }
}

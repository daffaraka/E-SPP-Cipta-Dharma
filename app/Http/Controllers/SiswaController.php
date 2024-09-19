<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{

    public function index()
    {
        $data['judul'] = 'Data Siswa';
        $data['siswas'] = Siswa::latest()->paginate(10);

        return view('admin.siswa.siswa-index',$data);
    }


    public function create()
    {
        return view('admin.siswa.siswa-create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
        ]);


        Siswa::create(
            [
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nama_wali' => $request->nama_wali,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'angkatan' => $request->angkatan,
                'kelas' => $request->kelas,
            ]
        );


        return redirect()->route('siswa.index')->with('success','Data siswa baru telah ditambahkan');
    }


    public function show(Siswa $siswa)
    {
        //
    }


    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.siswa-edit',compact('siswa'));
    }
    public function update(Request $request, Siswa $siswa)
    {
        $this->validate($request,[
            'nama' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
        ]);


        $siswa->update(
            [
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nama_wali' => $request->nama_wali,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'angkatan' => $request->angkatan,
                'kelas' => $request->kelas,
            ]
        );


        return redirect()->route('siswa.index')->with('success','Data siswa telah diupdate');

    }


    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success','Data siswa telah dihapus');
    }
}

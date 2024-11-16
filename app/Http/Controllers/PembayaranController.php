<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Biaya;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $data['judul'] = 'Pembayaran';
        $data['pembayarans'] = Tagihan::with(['siswa', 'biaya', 'penerbit', 'melunasi'])->whereNotNull('bukti_pelunasan')->latest()->get();
        return view('admin.pembayaran.pembayaran-index', $data);
    }

    public function show(Tagihan $pembayaran)
    {
        $data['judul'] = 'Detil Data Pembayaran';
        $data['pembayaran'] = $pembayaran;
        return view('admin.pembayaran.pembayaran-edit',$data);
    }

    public function edit(Tagihan $pembayaran)
    {
        $data['judul'] = 'Edit Data Pembayaran';
        $data['siswas'] = User::select('id', 'nama')->get();
        $data['biayas'] = Biaya::select('id', 'nama_biaya', 'nominal')->get();
        $data['pembayaran'] = $pembayaran;
        return view('admin.pembayaran.pembayaran-edit', $data);
    }


    public function destroy(Tagihan $pembayaran)
    {
        $pembayaran->delete();
        return to_route('pembayaran.index')->with('success', 'pembayaran telah dihapus');
    }


    public function verifikasi(Tagihan $pembayaran) {
        $pembayaran->status = 'Lunas';
        $pembayaran->melunasi_id = auth()->user()->id;
        $pembayaran->save();

        return to_route('pembayaran.index')->with('success', 'pembayaran telah diverifikasi');
    }
}

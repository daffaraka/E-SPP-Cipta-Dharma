@extends('admin.admin-layout')
@section('content')
    <div class="row">

        <div class="col-12">

            @if ($tagihanBelumLunas != null)
                <div class="card rounded-0">
                    <div class="card-body ">
                        <h5 class="card-title">Tagihan yang belum anda bayarkan</h5>

                        @foreach ($tagihanBelumLunas->tagihans as $tagihan)
                            <div class="card my-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $tagihan->nama_tagihan }} - <span
                                            class="badge p-1 px-2 rounded-pill bg-danger">{{ $tagihan->status }}</span> </h5>
                                    <p class="card-text">{{ $tagihan->tanggal_terbit }}</p>

                                    <div class="d-flex">
                                        <a href="{{route('pelunasan.tagihan', $tagihan->id)}}" class="btn btn-success me-3">Lunasi</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @else
            @endif

        </div>

        {{-- <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        Jumlah Barang
                        <h3>{{ $jumlah_barang   }}</h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        Barang Masuk
                        <h3>{{ $barang_masuk   }}</h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        Barang Keluar
                        <h3>{{ $barang_keluar   }}</h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Optionally add more cards if needed -->
        </div> --}}

    </div>
@endsection

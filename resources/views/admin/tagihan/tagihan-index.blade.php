@extends('admin.admin-layout')
@section('content')
    <div class="my-3">
        <a href="{{ route('tagihan.create') }}" class="btn btn-primary">Tambah Data Tagihan</a>

    </div>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nama Biaya</th>
                <th>Siswa</th>
                <th>Tanggal Terbit</th>
                <th>Tanggal Lunas</th>
                <th>Admin Penerbit</th>
                <th>Admin Melunasi</th>
                <th>Tanggal ditambahkan</th>
                <th>Aksi</th> <!-- Kolom untuk aksi -->
            </tr>
        </thead>
        <tbody>
            @foreach ($tagihans as $index => $tagihan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $tagihan->biaya->nama_biaya }}</td>
                    <td>{{ $tagihan->siswa->nama }}</td>
                    <td>{{ $tagihan->tanggal_terbit }}</td>
                    <td>{{ $tagihan->tanggal_lunas }}</td>
                    <td>{{ $tagihan->penerbit->nama }}</td>
                    <td>{{ $tagihan->melunasi->nama }}</td>

                    <td>{{ \Carbon\Carbon::parse($tagihan->created_at)->isoFormat('HH:mm:ss, dddd, D MMMM Y') }}</td>
                    <td>
                        <a href="{{ route('tagihan-masuk.edit', $tagihan->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('tagihan-masuk.destroy', $tagihan->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data tagihan keluar ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            {{ $tagihans->links() }}
        </tbody>
    </table>
@endsection

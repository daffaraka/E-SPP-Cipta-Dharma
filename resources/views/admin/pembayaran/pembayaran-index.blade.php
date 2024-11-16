@extends('admin.admin-layout')
@section('content')
    <table class="table table-light" id="dataTables">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nama Biaya</th>
                <th>Siswa</th>
                <th>Status</th>
                <th>Tanggal Terbit</th>
                <th>Tanggal Lunas</th>
                <th>Admin Penerbit</th>
                <th>Admin Melunasi</th>
                <th>Tanggal ditambahkan</th>
                <th>Aksi</th> <!-- Kolom untuk aksi -->
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayarans as $index => $pembayaran)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pembayaran->biaya->nama_biaya }}</td>
                    <td>{{ $pembayaran->siswa->nama }}</td>
                    <td>
                        @if ($pembayaran->status == 'Belum Lunas')
                            <span class="badge rounded-pill bg-danger">Belum Lunas</span>
                        @else
                            <span class="badge rounded-pill bg-success">Lunas</span>
                        @endif
                    </td>
                    <td>{{ $pembayaran->tanggal_terbit }}</td>
                    <td>{{ $pembayaran->tanggal_lunas ?? '-' }}</td>
                    <td>{{ $pembayaran->penerbit->nama ?? '-' }}</td>
                    <td>{{ $pembayaran->melunasi->nama ?? '-' }}</td>

                    <td>{{ \Carbon\Carbon::parse($pembayaran->created_at)->isoFormat('HH:mm:ss, dddd, D MMMM Y') }}</td>
                    <td>
                        <a href="{{ route('tagihan.edit', $pembayaran->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('tagihan.destroy', $pembayaran->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data tagihan keluar ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

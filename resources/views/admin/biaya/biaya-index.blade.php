@extends('admin.admin-layout')
@section('content')
    <div class="my-3">
        <a href="{{ route('biaya.create') }}" class="btn btn-primary">Tambah Data Biaya Baru</a>

    </div>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nama Biaya</th>
                <th>Nominal</th>
                <th>Nama Nominal</th>
                <th>Tahun </th>
                <th>Bulan</th>
                <th>Level</th>
                <th>Aksi</th> <!-- Kolom untuk aksi -->
            </tr>
        </thead>
        <tbody>
            @foreach ($biayas as $index => $biaya)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $biaya->nama_biaya }}</td>
                    <td>Rp.{{ number_format($biaya->nominal) }}</td>
                    <td>{{ $biaya->nama_nominal }}</td>
                    <td>{{ $biaya->tahun }}</td>
                    <td>{{ $biaya->bulan }}</td>
                    <td>{{ $biaya->level }}</td>
                    {{-- <td>{{ \Carbon\Carbon::parse($biaya->created_at)->isoFormat('HH:mm:ss, dddd, D MMMM Y') }}</td> --}}
                    <td>
                        <a href="{{ route('biaya.show', $biaya->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('biaya.edit', $biaya->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('biaya.destroy', $biaya->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data barang keluar ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            {{ $biayas->links() }}
        </tbody>
    </table>
@endsection

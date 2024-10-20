@extends('admin.admin-layout')
@section('content')
    <div class="my-3">
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
    </div>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nama Siswa</th>
                <th>Tanggal Lahir</th>
                <th>Nama Wali</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No Telfon</th>
                <th>Angkatan</th>
                <th>Kelas</th>

                <th>Aksi</th> <!-- Kolom untuk aksi -->
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $index => $siswa)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $siswa->name }}</td>
                    <td>{{ $siswa->tanggal_lahir }}</td>
                    <td>{{ $siswa->nama_wali }}</td>
                    <td>{{ $siswa->alamat }}</td>
                    <td>{{ $siswa->no_telp }}</td>
                    <td>{{ $siswa->email }}</td>
                    <td>{{ $siswa->angkatan }}</td>
                    <td>{{ $siswa->kelas }}</td>
                    <td>
                        <div class="d-grid">
                            <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-block btn-info my-1">Detail</a>
                            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-block btn-warning my-1">Edit</a>

                            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-block my-1"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">Hapus</button>
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach

            {{ $siswas->links() }}

        </tbody>
    </table>
@endsection

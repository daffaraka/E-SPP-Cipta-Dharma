@extends('admin.admin-layout')
@section('content')
    <div class="my-3">
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
    </div>
    <table class="table table-light" id="dataTable">
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
                        <div class="d-flex">
                            <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-sm btn-info mx-1 my-1"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-warning mx-1 my-1"><i class="fa fa-edit"></i></a>

                            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger mx-1 my-1"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach

            {{ $siswas->links() }}

        </tbody>
    </table>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endpush

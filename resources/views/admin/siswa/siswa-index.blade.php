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
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->tanggal_lahir }}</td>
                    <td>{{ $siswa->nama_wali }}</td>
                    <td>{{ $siswa->alamat }}</td>
                    <td>{{ $siswa->no_telp }}</td>
                    <td>{{ $siswa->email }}</td>
                    <td>{{ $siswa->angkatan }}</td>
                    <td>{{ $siswa->kelas }}</td>
                    <td>
                        <div class="d-flex">
                            <button type="button" class="btn btn-primary mx-1 my-1" data-bs-toggle="modal"
                                data-bs-target="#modalDetailSiswa" id="btnDetail" data-id="{{$siswa->id}}">
                                <i class="fa fa-eye"></i>
                            </button>
                            {{-- <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-sm btn-info mx-1 my-1"><i
                                    class="fa fa-eye"></i></a> --}}
                            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-warning mx-1 my-1"><i
                                    class="fa fa-edit"></i></a>

                            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger mx-1 my-1"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach

            {{ $siswas->links() }}

        </tbody>
    </table>


    <div class="modal fade" id="modalDetailSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama">Nama Siswa</label>
                        <input type="text" id="nama" name="nama" class="form-control" required autocomplete="" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required readonly>
                    </div>

                    <div class="mb-3">
                        <label for="kelas">Kelas</label>
                        <input id="kelas" name="kelas" class="form-control" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="angkatan">Angkatan</label>
                        <input type="number" id="angkatan" name="angkatan" class="form-control" required readonly>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required readonly>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control" required readonly>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="form-control" required readonly>
                    </div>

                    <div class="mb-3">
                        <label for="agama">Agama</label>
                        <select id="agama" name="agama" class="form-control" required readonly>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="no_telp">No Telfon</label>
                        <input type="text" id="no_telp" name="no_telp" class="form-control" required readonly>
                    </div>


                    <div class="mb-3">
                        <label for="nama_wali">Nama Wali</label>
                        <input type="text" id="nama_wali" name="nama_wali" class="form-control" required readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        $(document).on('click', '#btnDetail', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route('siswa.show', ':id') }}'.replace(':id', id),
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    $('#nama').val(response.nama);
                    $('#email').val(response.email);
                    $('#kelas').val(response.kelas);
                    $('#angkatan').val(response.angkatan);
                    $('#tanggal_lahir').val(response.tanggal_lahir);
                    $('#nama_wali').val(response.nama_wali);
                    $('#no_telp').val(response.no_telp);
                    $('#alamat').val(response.alamat);
                    $('#modalDetailSiswa').modal('show');
                }
            });
        });


    </script>
@endpush

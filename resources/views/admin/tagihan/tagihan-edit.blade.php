@extends('admin.admin-layout')
@section('content')
    <form action="{{ route('tagihan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="mb-3">
            <label for="">Nama Tagihan</label>
            <input type="text" name="nama_tagihan" class="form-control" value="{{ $tagihan->nama_tagihan }}" required>
        </div>

        <div class="mb-3">
            <label for="">Biaya</label>
            <select type="text" name="biaya_id" id="biaya_id" class="form-control" required>
                @foreach ($biayas as $item)
                    <option value="{{ $item->id }}" {{ $tagihan->biaya_id == $item->id ? 'selected' : '' }}>{{ $item->nama_biaya }} -
                        Rp.{{ number_format($item->nominal) }} </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="">Siswa</label>
            <select type="text" name="siswa_id" id="siswa_id" class="form-control" required>
                @foreach ($siswas as $item)
                    <option value="{{ $item->id }}" {{ $tagihan->siswa_id == $item->id ? 'selected' : '' }}>{{ $item->nama }} - Kelas {{ $item->kelas }} </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="">Tanggal Terbit</label>
            <input type="date" name="tanggal_terbit"  class="form-control" value="{{ $tagihan->tanggal_terbit ?? date('Y-m-d') }}">
            <label> Jika dikosongi otomatis di isi hari ini </label>
        </div>

        <div class="mb-3">
            <label for="">Tanggal Lunas</label>
            <input type="date" name="tanggal_lunas"  class="form-control" value="{{ $tagihan->tanggal_lunas }}">
            <label> Boleh dikosongi </label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@push('scrirpts')
    {{-- <script>
    document.getElementById('barang_id').addEventListener('change', function() {
        var barangId = this.value;

        // Lakukan request ke route untuk mendapatkan detail barang
        fetch('/barang-detail/' + barangId, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            // Update form input berdasarkan data barang yang didapatkan
            document.getElementById('stok_sekarang').value = data.stok_sekarang;
            document.getElementById('stok_minimal').value = data.stok_minimal;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script> --}}
@endpush

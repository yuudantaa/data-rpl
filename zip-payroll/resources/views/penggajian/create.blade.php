@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Tambah Penggajian</h2>

        <!-- Menampilkan pesan sukses atau error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('penggajian.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_karyawan">Nama Karyawan</label>
                <input type="text" name="nama_karyawan" class="form-control" id="nama_karyawan" required>
            </div>

            <div class="form-group">
                <label for="perusahaan">Perusahaan</label>
                <input type="text" name="perusahaan" class="form-control" id="perusahaan" required>
            </div>

            <div class="form-group">
                <label for="gaji_pokok">Gaji Pokok</label>
                <input type="number" name="gaji_pokok" class="form-control" id="gaji_pokok" required>
            </div>

            <div class="form-group">
                <label for="bonus">Bonus</label>
                <input type="number" name="bonus" class="form-control" id="bonus" value="0">
            </div>

            <button type="submit" class="btn btn-primary">Tambah Penggajian</button>
        </form>
    </div>
@endsection

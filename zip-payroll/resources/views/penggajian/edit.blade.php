@extends('layouts.main')

@section('title', 'Edit Penggajian')

@section('content')
<!-- Latar Belakang Halaman -->
<div class="container-fluid" style="background: linear-gradient(135deg, #4565bd, #2193b0); min-height: 100vh; padding: 50px 0;">
    <div class="container mt-5" style="max-width: 800px;">

        <!-- Judul Form -->
        <h1 class="text-center mb-4" style="font-family: 'Arial', sans-serif; font-weight: bold; color: #ffffff; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);">
            Edit Penggajian
        </h1>

        <!-- Card Form -->
        <div class="card shadow-lg" style="border-radius: 15px; overflow: hidden;">
            <div class="card-body" style="background: #adafe6; padding: 40px;">

                <form action="{{ route('penggajian.update', $penggajian->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nama Karyawan -->
                    <div class="form-group">
                        <label for="nama_karyawan" class="font-weight-bold" style="color: #000000;">Nama Karyawan</label>
                        <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control"
                               value="{{ old('nama_karyawan', $penggajian->nama_karyawan) }}"
                               placeholder="Masukkan Nama Karyawan" required>
                    </div>

                    <!-- Nama Perusahaan -->
                    <div class="form-group">
                        <label for="perusahaan" class="font-weight-bold" style="color: #000408;">Nama Perusahaan</label>
                        <input type="text" name="perusahaan" id="perusahaan" class="form-control"
                               value="{{ old('perusahaan', $penggajian->perusahaan) }}"
                               placeholder="Masukkan Nama Perusahaan" required>
                    </div>

                    <!-- Gaji Pokok -->
                    <div class="form-group">
                        <label for="gaji_pokok" class="font-weight-bold" style="color: #000000;">Gaji Pokok</label>
                        <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control"
                               value="{{ old('gaji_pokok', $penggajian->gaji_pokok) }}" placeholder="Masukkan Gaji Pokok" required>
                    </div>

                    <!-- Bonus -->
                    <div class="form-group">
                        <label for="bonus" class="font-weight-bold" style="color: #00060c;">Bonus</label>
                        <input type="number" name="bonus" id="bonus" class="form-control"
                               value="{{ old('bonus', $penggajian->bonus) }}" placeholder="Masukkan Bonus">
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="status" class="font-weight-bold" style="color: #000000;">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="Pending" {{ $penggajian->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Disetujui" {{ $penggajian->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                            <option value="Ditolak" {{ $penggajian->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-lg" style="background: #007BFF; color: #ffffff; border-radius: 30px; padding: 12px 30px; font-weight: bold; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); transition: transform 0.3s;">
                            Update
                        </button>
                        <a href="{{ route('penggajian.index') }}" class="btn btn-lg" style="background: #ddd; color: #333; border-radius: 30px; padding: 12px 30px; font-weight: bold; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.main')

@section('content')
<div class="container mt-5" style="background: #48a2e3; border-radius: 15px; padding: 30px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <h1 class="text-center mb-4" style="font-family: 'Arial', sans-serif; font-weight: bold; color: #333;">Data Penggajian</h1>

    <!-- Link menuju halaman tambah penggajian -->
    <a href="{{ route('penggajian.create') }}" class="btn btn-success mb-3" style="border-radius: 25px; padding: 12px 25px; font-size: 16px; transition: background-color 0.3s ease; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <i class="fas fa-plus-circle"></i> Tambah Penggajian
    </a>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover shadow-lg rounded-lg">
            <thead class="thead-dark" style="background-color: #28b900; color: #c2c2c2;">
                <tr>
                    <th>ID</th>
                    <th>Nama Karyawan</th>
                    <th>Perusahaan</th>
                    <th>Gaji Pokok</th>
                    <th>Bonus</th>
                    <th>Total Gaji</th>
                    <th>Status</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPenggajian as $penggajian)
                <tr style="background-color: #f1f6f3;">
                    <td>{{ $penggajian->id }}</td>
                    <td>{{ $penggajian->nama_karyawan }}</td>
                    <td>{{ $penggajian->perusahaan }}</td>
                    <td>Rp {{ number_format($penggajian->gaji_pokok, 2, ',', '.') }}</td>
                    <td>Rp {{ number_format($penggajian->bonus, 2, ',', '.') }}</td>
                    <td>Rp {{ number_format($penggajian->total_gaji, 2, ',', '.') }}</td>
                    <td>
                        <span class="badge {{ $penggajian->status == 'Lunas' ? 'badge-success' : 'badge-warning' }}">
                            {{ $penggajian->status }}
                        </span>
                    </td>
                    <td>{{ $penggajian->created_at->format('d M Y H:i') }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('penggajian.edit', $penggajian->id) }}" class="btn btn-warning btn-sm" style="border-radius: 50px; padding: 6px 12px;">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <!-- Form Hapus -->
                        <form action="{{ route('penggajian.destroy', $penggajian->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 50px; padding: 6px 12px;" onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Optional: Add Font Awesome for Icons -->
@section('scripts')
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection

@endsection

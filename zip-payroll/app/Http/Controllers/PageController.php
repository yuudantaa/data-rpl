<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Perusahaan;
use App\SumberDana;
use App\Penggajian;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Home Page
     */
    public function home() {
        return view("home", ["key" => "home"]);
    }

    /**
     * Daftar Karyawan
     */
    public function daftarKaryawan()
    {
        $karyawans = Karyawan::with('perusahaan')->get();
        return view('daftarKaryawan', [
            'karyawans' => $karyawans,
            'key' => 'daftarKaryawan'
        ]);
    }

    /**
     * Daftar Perusahaan
     */
    public function daftarPerusahaan() {
        $perusahaans = Perusahaan::withCount('karyawans')->get(); // Menghitung jumlah karyawan
        return view("daftarPerusahaan", [
            "key" => "daftarPerusahaan",
            "perusahaans" => $perusahaans
        ]);
    }

    /**
     * Daftar Sumber Dana
     */
    public function daftarSumberDana()
    {
        $sumberDanas = SumberDana::all();
        return view('daftarSumberDana', [
            'key' => 'daftarSumberDana',
            'sumberDanas' => $sumberDanas,
        ]);
    }

    /**
     * Karyawan Management
     */
    public function createKaryawan()
    {
        $perusahaans = Perusahaan::all();
        return view('karyawan.create', compact('perusahaans'));
    }

    public function storeKaryawan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_rekening' => 'required|numeric',
            'status' => 'required',
            'department' => 'required',
            'joining_date' => 'required|date',
            'nama_bank' => 'required',
            'perusahaan_id' => 'required|exists:perusahaans,id',
        ]);

        Karyawan::create($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil disimpan.');
    }

    public function editKaryawan(Karyawan $karyawan)
    {
        $perusahaans = Perusahaan::all();
        return view('karyawan.edit', compact('karyawan', 'perusahaans'));
    }

    public function updateKaryawan(Request $request, Karyawan $karyawan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'no_rekening' => 'required|string',
            'status' => 'required|string',
            'department' => 'required|string',
            'joining_date' => 'required|date',
            'nama_bank' => 'required|string',
            'perusahaan_id' => 'required|exists:perusahaans,id',
        ]);

        $karyawan->update($validatedData);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diupdate.');
    }

    public function destroyKaryawan($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus!');
    }

    /**
     * Perusahaan Management
     */
    public function createPerusahaan()
    {
        return view('perusahaan.createperusahaan');
    }

    public function storePerusahaan(Request $request)
    {
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'nama_bank' => 'required|string|max:255',
            'rekening' => 'required|string|max:20',
        ]);

        Perusahaan::create($validatedData);

        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil ditambahkan');
    }

    public function editPerusahaan($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        return view('perusahaan.editperusahaan', compact('perusahaan'));
    }

    public function updatePerusahaan(Request $request, $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'nama_bank' => 'required|string|max:255',
            'rekening' => 'required|string|max:20',
            'jumlah_karyawan' => 'required|integer|min:1',
        ]);

        $perusahaan->update($validatedData);

        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil diperbarui!');
    }

    public function destroyPerusahaan($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();

        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil dihapus!');
    }

    /**
     * Sumber Dana Management
     */
    public function createSumberDana()
    {
        return view('sumberDana.create');
    }

    public function storeSumberDana(Request $request)
    {
        $validatedData = $request->validate([
            'nama_sumber' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        SumberDana::create($validatedData);

        return redirect()->route('sumberDana.index')->with('success', 'Sumber dana berhasil ditambahkan!');
    }

    public function editSumberDana($id)
    {
        $sumberDana = SumberDana::findOrFail($id);
        return view('sumberDana.edit', compact('sumberDana'));
    }

    public function updateSumberDana(Request $request, $id)
    {
        $sumberDana = SumberDana::findOrFail($id);

        $validatedData = $request->validate([
            'nama_sumber' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $sumberDana->update($validatedData);

        return redirect()->route('sumberDana.index')->with('success', 'Sumber dana berhasil diperbarui!');
    }

    public function destroySumberDana($id)
    {
        $sumberDana = SumberDana::findOrFail($id);
        $sumberDana->delete();

        return redirect()->route('sumberDana.index')->with('success', 'Sumber dana berhasil dihapus!');
    }
    public function penggajian()
    {
        $dataPenggajian = Penggajian::all(); // Memanggil data dari database
        return view('penggajian', compact('dataPenggajian'));
    }
    public function updatePenggajian(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric|min:0',
            'bonus' => 'nullable|numeric|min:0',
            'status' => 'required|string|in:Pending,Disetujui,Ditolak',
        ]);

        // Cari data penggajian berdasarkan ID
        $penggajian = Penggajian::findOrFail($id);

        // Hitung total gaji
        $totalGaji = $validatedData['gaji_pokok'] + ($validatedData['bonus'] ?? 0);

        // Update data penggajian
        $penggajian->update([
            'nama_karyawan' => $validatedData['nama_karyawan'],
            'perusahaan' => $validatedData['perusahaan'],
            'gaji_pokok' => $validatedData['gaji_pokok'],
            'bonus' => $validatedData['bonus'] ?? 0,
            'total_gaji' => $totalGaji,
            'status' => $validatedData['status'],
        ]);

        // Redirect ke halaman penggajian.index dengan pesan sukses
        return redirect()->route('penggajian.index')->with('success', 'Data penggajian berhasil diperbarui!');
    }





    public function createPenggajian()
    {
        return view('penggajian.create');
    }

    public function storePenggajian(Request $request)
{
    $request->validate([
        'nama_karyawan' => 'required|string|max:255',
        'perusahaan' => 'required|string|max:255',
        'gaji_pokok' => 'required|numeric',
        'bonus' => 'nullable|numeric',
    ]);

    // Menghitung total gaji
    $totalGaji = $request->gaji_pokok + ($request->bonus ?? 0);

    // Menyimpan penggajian ke database
    Penggajian::create([
        'nama_karyawan' => $request->nama_karyawan,
        'perusahaan' => $request->perusahaan,
        'gaji_pokok' => $request->gaji_pokok,
        'bonus' => $request->bonus ?? 0,
        'total_gaji' => $totalGaji,
        'status' => 'Pending',  // Status default
    ]);

    return redirect()->route('penggajian.index')->with('success', 'Data penggajian berhasil ditambahkan!');
}
public function editPenggajian($id)
{
    $penggajian = Penggajian::findOrFail($id);
    return view('penggajian.edit', compact('penggajian'));
}

public function destroyPenggajian($id)
{
    $penggajian = Penggajian::findOrFail($id);
    $penggajian->delete();
    return redirect()->route('penggajian.index')->with('success', 'Penggajian berhasil dihapus!');
}
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function perusahaanDashboard()
    {
        return view('perusahaan.dashboard');
    }
    public function loginhome()
{
    return view('login.home'); // Pastikan file resources/views/dashboard.blade.php ada
}


    public function bankDashboard()
    {
        return view('bank.dashboard');
    }


        public function login()
        {
            return view('auth.login'); // Default path untuk Laravel auth
        }
        // Proses login
        public function processLogin(Request $request)
        {
            \Log::info('Request data: ', $request->all()); // Logging input

            if ($request->name === 'admin' && $request->password === 'password' && $request->jabatan === 'admin bank') {
                \Log::info('Login success: Redirecting to dashboard');
                return redirect()->route('home');
            }

            \Log::info('Login failed: Invalid credentials');
            return back()->withErrors(['login' => 'Nama, password, atau jabatan salah.'])->withInput();
        }
}

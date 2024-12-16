@extends('layouts.main')

@section('title', 'login')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100" style="background: linear-gradient(to bottom, #0066cc, #003366);">
    <div class="card p-4 shadow-lg" style="width: 24rem; border-radius: 12px; background-color: #ffffff;">
        <h2 class="text-center mb-4" style="color: #003366; font-weight: bold;">Login</h2>
        <form method="POST" action="{{ route('login.process') }}">
            @csrf
            <!-- Username Field -->
            <div class="form-group mb-3">
                <label for="username" class="form-label" style="color: #003366;">Username</label>
                <input type="text" id="username" name="name" class="form-control" required style="border: 1px solid #0066cc; border-radius: 6px;">
            </div>

            <!-- Password Field -->
            <div class="form-group mb-3">
                <label for="password" class="form-label" style="color: #003366;">Password</label>
                <input type="password" id="password" name="password" class="form-control" required style="border: 1px solid #0066cc; border-radius: 6px;">
            </div>

            <!-- Jabatan Field -->
            <div class="form-group mb-3">
                <label for="jabatan" class="form-label" style="color: #003366;">Jabatan</label>
                <select id="jabatan" name="jabatan" class="form-control" required style="border: 1px solid #0066cc; border-radius: 6px;">
                    <option value="" disabled selected>Pilih Jabatan</option>
                    <option value="manager">Manager</option>
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100" style="background-color: #0066cc; border: none; border-radius: 6px;">
                Login
            </button>
        </form>

        <!-- Optional Link -->
        <div class="text-center mt-3">
            <a href="#" style="color: #0066cc; text-decoration: none;">Lupa Password?</a>
        </div>
    </div>
</div>
@endsection

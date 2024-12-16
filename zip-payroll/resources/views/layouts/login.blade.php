@extends('layouts.main')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100" style="background: linear-gradient(to bottom, #0066cc, #003366);">
    <div class="card p-4 shadow-lg" style="width: 24rem; border-radius: 12px; background-color: #ffffff;">
        <h2 class="text-center mb-4" style="color: #003366; font-weight: bold;">Login</h2>
        <form method="POST" action="{{ route('login.process') }}">
            @csrf

            <!-- Name Field -->
            <div class="form-group mb-3">
                <label for="name" class="form-label" style="color: #003366;">Nama</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required style="border: 1px solid #0066cc; border-radius: 6px;">
            </div>

            <!-- Email Field -->
            <div class="form-group mb-3">
                <label for="email" class="form-label" style="color: #003366;">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required style="border: 1px solid #0066cc; border-radius: 6px;">
            </div>

            <!-- Password Field -->
            <div class="form-group mb-3">
                <label for="password" class="form-label" style="color: #003366;">Password</label>
                <input type="password" id="password" name="password" class="form-control" required style="border: 1px solid #0066cc; border-radius: 6px;">
            </div>

            <!-- Jabatan Field -->
            <div class="form-group mb-3">
                <label for="jabatan" class="form-label" style="color: #003366;">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" class="form-control" value="{{ old('jabatan') }}" required style="border: 1px solid #0066cc; border-radius: 6px;">
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

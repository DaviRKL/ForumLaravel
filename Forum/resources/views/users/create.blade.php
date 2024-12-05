@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/signIn.css') }}">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%; border-radius: 12px;">
        <h2 class="text-center mb-4" style="color: #563d7c;">Cadastre-se</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label fw-bold" style="color: #563d7c;">Nome:</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold" style="color: #563d7c;">Email:</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-bold" style="color: #563d7c;">Senha:</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary" style="background: linear-gradient(90deg, #6f42c1, #6610f2); border: none;">Cadastrar</button>
            </div>
        </form>
        <div class="mt-3 text-center">
            <a href="{{ route('login') }}" class="text-decoration-none" style="color: #563d7c;">Já tem uma conta? Faça login</a>
        </div>
    </div>
</div>
@endsection

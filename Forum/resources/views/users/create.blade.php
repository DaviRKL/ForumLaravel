@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/signIn.css') }}">
<div class="signIn-container">
    
    <form action="{{route('register')}}" method="POST" class="signIn-form">
        <h2 class="signIn-title">Cadastre-se</h2>
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" id="name" name="name" class="form-input" value="{{ old('name') }}" required>
            @error('name') <span>{{$message}}</span> @enderror
        </div>
    
        <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-input"  value="{{ old('email') }}" required>
            @error('email') <span>{{$message}}</span> @enderror
        </div>
    
        <div class="form-group">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" id="password" name="password" class="form-input" required>
            @error('password') <span>{{$message}}</span> @enderror
        </div>
    
        <input type="submit" class="submit-button" value="Enviar">
    </form>
</div>
@endsection

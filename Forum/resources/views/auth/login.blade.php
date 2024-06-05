@extends('layouts.header_footer')

@section('content')
<div class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
    <h2 class="text-center">Login</h2>
    <form action="{{ route('login')}}" method="POST" class="w-50">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control"  value="{{ old('email') }}" required>
            @error('email') <span>{{$message}}</span> @enderror
        </div>
    
        <div class="mb-3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" id="password" name="password" class="form-control">
            @error('email') <span>{{$message}}</span> @enderror
        </div>
    
        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>
</div>
@endsection

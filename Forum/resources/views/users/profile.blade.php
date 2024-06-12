@extends('layouts.header_footer')

@section('content')
<div class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
    <h2 class="text-center">Perfil</h2>
    <span>{{ session('message') }}</span>
    @if ($user != null)
        <form action="{{route('updateUser' , [$user->id])}}" method="POST" class="w-50">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}" placeholder = "{{$user->name}}" required>
                @error('name') <span>{{$message}}</span> @enderror
            </div>
        
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control"  value="{{$user->email}}" placeholder = "{{$user->email}}"required>
                @error('email') <span>{{$message}}</span> @enderror
            </div>
        
            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" id="password" name="password" value="{{$user->password}}" placeholder = "{{$user->password}}" class="form-control">
                @error('password') <span>{{$message}}</span> @enderror
            </div>
        
            <input type="submit" class="btn btn-primary" value="Enviar">
        </form>
        <form action="{{route('deleteUser' , [$user->id])}}" method="POST" class="w-50">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Excluir">
        </form>
    @endif
</div>
@endsection

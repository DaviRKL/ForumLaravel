@extends('layouts.header_footer')

@section('content')
<div class="create-post-container">
    
    <form action="{{route('createCategory')}}" method="POST" class="create-post-form">
        <h2 class="create-post-title">Crie sua Tag!</h2>
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Titulo da Categoria:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title') }}" required>
            @error("title") <span>{{$message}}</span> @enderror
            <label for="description" class="form-label">Descrição da Categoria:</label>
            <input type="text" id="description" name="description" class="form-input" value="{{ old('description') }}" required>
            @error("description") <span>{{$message}}</span> @enderror
        </div>
        <input type="submit" class="submit-button" value="Enviar">
    </form>
</div>
@endsection

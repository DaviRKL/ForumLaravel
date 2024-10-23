@extends('layouts.header_footer')

@section('content')
<div class="create-post-container">
    
    <form action="{{route('createTopic')}}" method="POST" class="create-post-form">
        <h2 class="create-post-title">Crie seu Topico!</h2>
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Titulo do Topico:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title') }}" required>
            @error("title") <span>{{$message}}</span> @enderror
            <label for="description" class="form-label">Descrição do Topico:</label>
            <input type="text" id="description" name="description" class="form-input" value="{{ old('description') }}" required>
            @error("description") <span>{{$message}}</span> @enderror
            <label for="status" class="form-label">Status do Topico:</label>
            <input type="number" id="status" name="status" class="form-input" value="{{ old('status') }}" required>
            @error("status") <span>{{$message}}</span> @enderror
            <label for="image" class="form-label">Imagem do Topico:</label>
            <input type="text" id="image" name="image" class="form-input" value="{{ old('image') }}" required>
            @error("image") <span>{{$message}}</span> @enderror
        </div>
        <input type="submit" class="submit-button" value="Enviar">
    </form>
</div>
@endsection

@extends('layouts.header_footer')

@section('content')
<div class="create-tag-container">
    <form action="{{ route('createTag') }}" method="POST" class="create-tag-form">
        <h2 class="create-tag-title">Crie sua Tag!</h2>
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Título da Tag:</label>
            <input
                type="text"
                id="title"
                name="title"
                class="form-input"
                value="{{ old('title') }}"
                placeholder="Digite o título da tag"
                required>
            @error('title')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-actions">
            <input type="submit" class="submit-button" value="Criar">
        </div>
    </form>
</div>
@endsection

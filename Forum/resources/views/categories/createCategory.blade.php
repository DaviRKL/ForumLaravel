@extends('layouts.header_footer')

@section('content')
<div class="create-category-container">
    <form action="{{ route('createCategory') }}" method="POST" class="create-category-form">
        <h2 class="create-category-title">Crie sua Categoria!</h2>
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Título da Categoria:</label>
            <input
                type="text"
                id="title"
                name="title"
                class="form-input"
                value="{{ old('title') }}"
                placeholder="Digite o título da categoria"
                required>
            @error("title")
                <span class="error-message">{{ $message }}</span>
            @enderror


            <label for="description" class="form-label">Descrição da Categoria:</label>
            <input
                type="text"
                id="description"
                name="description"
                class="form-input"
                value="{{ old('description') }}"
                placeholder="Descreva brevemente a categoria"
                required>
            @error("description")
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>


        <input type="submit" class="submit-button" value="Criar Categoria">
    </form>
</div>
@endsection

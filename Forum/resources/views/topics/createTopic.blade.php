@extends('layouts.header_footer')

@section('content')
    <div class="container custom-container mt-5 mb-5">
        <h1 class="text-center">Criar Tópico</h1>

        <form action="{{ route('createTopic') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title" class="inputTitle">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="description" class="inputTitle">Descrição</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="status" class="inputTitle">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Ativo</option>
                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inativo</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="category_id" class="inputTitle">Categoria</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Selecione uma categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <label for="tags" class="inputTitle">Selecione as tags</label>
            <div class="form-group">
                @foreach ($tags as $tag)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="tags[]" value="{{ $tag->id }}"
                            {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tags">{{ $tag->title }}</label>
                    </div>
                @endforeach
            </div>
            @error('tags')
                <span class="text-danger">{{ $message }}</span>
            @enderror


            <div class="form-group mt-3">
                <label for="photo" class="inputTitle">Imagem</label>
                <input type="file" name="photo" id="photo" class="form-control">
                @error('photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <input type="submit" class="submit-button" value="Criar Tópico">
        </form>
    </div>
@endsection

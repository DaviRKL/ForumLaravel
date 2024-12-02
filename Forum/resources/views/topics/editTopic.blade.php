@extends('layouts.header_footer')

@section('content')
<div class="container custom-container mt-5 mb-5">
    <h1 class="text-center">Editar Tópico</h1>

    <form action="{{ route('updateTopic', $topic->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $topic->title) }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $topic->description) }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="1" {{ $topic->status == 1 ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ $topic->status == 0 ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="category_id">Categoria</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $topic->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="photo">Imagem</label>
            <input type="file" name="photo" id="photo" class="form-control">
            @if($topic->post->image)
                <img src="{{ asset('storage/' . $topic->post->image) }}" alt="Imagem atual" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-warning btn-sm mt-4">Confirmar Edição</button>
    </form>
</div>
@endsection

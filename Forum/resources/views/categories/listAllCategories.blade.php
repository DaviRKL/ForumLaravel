@extends('layouts.header_footer')

@section('content')
<div class="container-categories">
    <div class="categories-list-container">
        <h2 class="categories-list-title">Lista de Categorias</h2>
        <div class="table-container">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Título da Categoria</th>
                        <th>Descrição</th>
                        <th>Editar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}">
                                    <i class="fa-solid fa-edit"></i> Editar
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#banModal{{ $category->id }}">
                                    <i class="fa-solid fa-trash-can"></i> Excluir
                                </a>
                            </td>
                        </tr>

                        <!-- Modal de Edição -->
                        <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1"
                            aria-labelledby="editModalLabel{{ $category->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $category->id }}">Editar Categoria</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('updateCategory', [$category->id]) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label for="title{{ $category->id }}" class="form-label">Título:</label>
                                                <input type="text" id="title{{ $category->id }}" name="title"
                                                    class="form-input" value="{{ old('title', $category->title) }}" required>
                                                @error('title') <span class="error-message">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="description{{ $category->id }}" class="form-label">Descrição:</label>
                                                <input type="text" id="description{{ $category->id }}" name="description"
                                                    class="form-input" value="{{ old('description', $category->description) }}" required>
                                                @error('description') <span class="error-message">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal de Exclusão -->
                        <div class="modal fade" id="banModal{{ $category->id }}" tabindex="-1"
                            aria-labelledby="banModalLabel{{ $category->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="banModalLabel{{ $category->id }}">Excluir Categoria</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tem certeza que deseja excluir esta categoria?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('deleteCategory', [$category->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Confirmar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.header_footer')
@section('content')
    <div class="containerAllUsers">
        <div class="topics-list">

            <div class="table-topics-container">
                <h2>Lista de Categorias</h2>
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
                                    <div class="row">
                                        <!-- Botão para abrir o modal de edição -->
                                        <a class="btn btn-edit" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $category->id }}">
                                            <i class="fa-solid fa-edit"></i> Editar
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#banModal{{ $category->id }}">
                                        <i class="fa-solid fa-ban"></i> Excluir
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal de Edição de Categoria -->
                            <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1"
                                aria-labelledby="editModalLabel{{ $category->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $category->id }}">Editar Categoria
                                            </h5>
                                            <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close"
                                                id="close-btn"></i>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('updateCategory', [$category->id]) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="form-group">
                                                    <label for="title{{ $category->id }}" class="form-label">Título da
                                                        Categoria:</label>
                                                    <input type="text" id="title{{ $category->id }}" name="title"
                                                        class="form-input" value="{{ old('title', $category->title) }}"
                                                        required>
                                                    @error('title')
                                                        <span>{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="description{{ $category->id }}"
                                                        class="form-label">Descrição da Categoria:</label>
                                                    <input type="text" id="description{{ $category->id }}"
                                                        name="description" class="form-input"
                                                        value="{{ old('description', $category->description) }}" required>
                                                    @error('description')
                                                        <span>{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Salvar
                                                        Alterações</button>
                                                </div>
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

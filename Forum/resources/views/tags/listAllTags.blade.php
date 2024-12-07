@extends('layouts.header_footer')
@section('content')
    <div class="container-tags">
        <div class="tags-list-container">
            <h2 class="tags-list-title">Lista de Tags</h2>
            <div class="table-container">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Título do Tag</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->title }}</td>
                                <td>
                                    <button type="button" class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editModal-{{ $tag->id }}">
                                        Editar
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal-{{ $tag->id }}">
                                        <i class="fa-solid fa-ban"></i> Excluir Tag
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal para Excluir -->
                            <div class="modal fade" id="banModal-{{ $tag->id }}" tabindex="-1" aria-labelledby="banModalLabel-{{ $tag->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="banModalLabel-{{ $tag->id }}">Excluir Tag</h5>
                                            <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close"></i>
                                        </div>
                                        <div class="modal-body">
                                            Você tem certeza que deseja excluir este Tag?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('deleteTag', [$tag->id]) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa-solid fa-trash-can"></i> Confirmar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal para Editar -->
                            <div class="modal fade" id="editModal-{{ $tag->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $tag->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel-{{ $tag->id }}">Editar Tag</h5>
                                            <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close"></i>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('updateTag', [$tag->id]) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="form-group">
                                                    <label for="title-{{ $tag->id }}" class="form-label">Título da Tag:</label>
                                                    <input type="text" id="title-{{ $tag->id }}" name="title" class="form-input" value="{{ old('title', $tag->title) }}" required>
                                                    @error('title')
                                                        <span class="error-message">{{ $message }}</span>
                                                    @enderror
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

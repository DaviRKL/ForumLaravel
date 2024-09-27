@extends('layouts.header_footer')
@section('content')
    <div class="containerAllUsers">
        <div class="topics-list">

            <div class="table-topics-container">
                <h2>Lista de Tags</h2>
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
                                <div class="row">
                                    <input type="submit" class="btn btn-edit"  data-bs-toggle="modal" data-bs-target="#editModal" value="Editar">

                                </div>
                            </td>
                            <td>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal"><i class="fa-solid fa-ban"></i> Excluir Tag</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="banModal" tabindex="-1" aria-labelledby="banModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="banModalLabel">Excluir Tag</h5>
                    <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close" id="close-btn"></i>
                </div>
                <div class="modal-body">
                    Você tem certeza que deseja excluir este Tag?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('deleteTag', [$tag->id]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Tag</h5>
                    <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close" id="close-btn"></i>
                </div>
                <div class="modal-body">
                    <form action="{{ route('updateTag', [$tag->id]) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title" class="form-label">Titulo da Tag:</label>
                            <input type="text" id="title" name="title" class="form-input" value="{{ old('title', $tag->title) }}" required>
                            @error('title') <span>{{$message}}</span> @enderror
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
@endsection

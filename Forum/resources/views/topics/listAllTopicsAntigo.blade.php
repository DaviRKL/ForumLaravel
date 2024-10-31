@extends('layouts.header_footer')
@section('content')
    <div class="containerAllUsers">
        <div class="topics-list">
           
            <div class="table-topics-container">
                <h2>Lista de Tópicos</h2>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Título do Tópico</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                        <tr>
                        @foreach ($topics as $topic)
                        <tr>
                            <td>{{ $topic->title }}</td>
                            <td>
                                <div class="row">
                                    <input type="submit" class="btn btn-edit" value="Editar">

                                </div>

                            </td>
                            <td>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal"><i class="fa-solid fa-ban"></i> Excluir tópico</a>
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
                    <h5 class="modal-title" id="banModalLabel">Excluir Topico</h5>
                    <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close" id="close-btn"></i>
                </div>
                <div class="modal-body">
                    Você tem certeza que deseja excluir este Tópico?
                </div>
                <div class="modal-footer">
                    <form action="" method="POST" class="w-500">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.header_footer')

@section('content')
    <div class="containerAllUsers">
        <div class="user-list">
            <h2>Lista de Usuários</h2>
            <div class="row">
                @foreach ($users as $user)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <p class="card-text">{{ $user->email }}</p>
                                <a class="btn btn-edit"><i class="fa-solid fa-head-side-cough-slash"></i>Suspender</a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal"><i
                                        class="fa-solid fa-user-slash"></i> Banir</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="modal fade" id="banModal" tabindex="-1" aria-labelledby="banModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="banModalLabel">Banir Usuario</h5>
                        <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close" id="close-btn"></i>
                    </div>
                    <div class="modal-body">
                        Você tem certeza que deseja banir este usuario?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal"><i
                                class="fa-solid fa-rotate-left"></i> Voltar</button>
                        <button type="button" class="btn btn-danger"><i class="fa-solid fa-user-slash"></i> Confirmar
                            Banimento</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection

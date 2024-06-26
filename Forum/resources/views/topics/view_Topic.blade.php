@extends('layouts.header_footer')

@section('content')
    <div class="create-post-container">

        <form action="{{ route('register') }}" method="POST" class="create-post-form">
            <h2 class="create-post-title">Topico #1</h2>
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Titulo da Topico:</label>
                <input type="text" id="title" name="title" class="form-input" value="{{ old('title') }}" required>
                @error('title')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            
            <div class="row">
                <button type="submit" class="btn btn-edit btn-edit-topico"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal"><i class="fa-solid fa-trash-can"></i>
                    Excluir topico</a>
            </div>
        </form>
    </div>
    <div class="modal fade" id="banModal" tabindex="-1" aria-labelledby="banModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="banModalLabel">Excluir Topico</h5>
                    <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close" id="close-btn"></i>
                </div>
                <div class="modal-body">
                    Você tem certeza que deseja excluir esse Topico?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal"><i
                            class="fa-solid fa-rotate-left"></i> Voltar</button>
                    <form  {{-- action="{{ route('deleteUser', [$user->id]) }}" --}} method="POST" >
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.header_footer')

@section('content')
<div class="containerAllUsers">
         <div class="user-list">
            <h2>Lista de Usuários</h2>
            <div class="row">
                @foreach($users as $user)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">{{ $user->email }}</p>
                            <a class="btn btn-edit"><i class="fa-solid fa-head-side-cough-slash"></i>Suspender</a>
                            <a class="btn btn-danger"><i class="fa-solid fa-user-slash"></i> Banir</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> 
        </div>
    
</div>
@endsection

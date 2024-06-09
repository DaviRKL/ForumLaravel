@extends('layouts.header_footer')

@section('content')
<div class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
    <h2>Lista de Usuários</h2>
   
        <ul class="user-list">
            <div class="row">
                @foreach($users as $user)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> 
        </ul>
    
</div>
@endsection


@extends('layouts.header_footer')
@section('content')
    <div class="containerAllUsers">
        <div class="user-list">
            <h2>Lista de Tópicos</h2>
            <div class="table-topics-container">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Título do Tópico</th>
                            <th>Ações</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Topico #1</td>
                            <td><button class="btn btn-dark"></button><button class="btn btn-dark"></button></td>
                        </tr>
                        <tr>
                            <td>Topico #2</td>
                           <td><button class="btn btn-dark"></button><button class="btn btn-dark"></button></td>
                        </tr>
                        <tr>
                            <td>Topico #3</td>
                           <td><button class="btn btn-dark"></button><button class="btn btn-dark"></button></td>
                        </tr>
                        <tr>
                            <td>Topico #4</td>
                           <td><button class="btn btn-dark"></button><button class="btn btn-dark"></button></td>
                        </tr>
                        <tr>
                            <td>Topico #5</td>
                           <td><button class="btn btn-dark"></button><button class="btn btn-dark"></button></td>
                        </tr>
                        <tr>
                            <td>Topico #6</td>
                           <td><button class="btn btn-dark"></button><button class="btn btn-dark"></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            

        </div>
    </div>
@endsection

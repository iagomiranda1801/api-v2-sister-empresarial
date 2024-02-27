@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-header">
                #filtros
            </div>
        </div>
        <div class="card-body">
            {{-- Criar uma tablea bootstrap para clientes  --}}
            <table id="cliente" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Toaqui</th>
                        <th>Token Toaqui</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $c)
                        <tr>
                          <td>{{$c->name}}</td>
                          <td>{{$c->email}}</td>
                          <td>{{$c->to_aqui}}</td>
                          <td>{{$c->x_partner}}</td>
                          <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop

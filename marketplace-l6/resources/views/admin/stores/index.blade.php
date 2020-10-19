@extends('layouts.app')

@section('content')
    <h1 class="display-4">Lista de lojas</h1>
    <hr>
    @if(!$store)
    <a href="{{route('admin.stores.create')}}" class="btn btn-primary mb-2">Nova loja</a>
    @endif
    <table class="table table-striped">
        <caption>Lista de lojas</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Qtdd Produtos</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{$store->id}}</td>
                    <td>{{$store->name}}</td>
                    <td>{{$store->products->count()}}</td>
                    <td class="btn-group">
                        <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm mr-2 btn-warning">Editar</a>
                        <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
        </tbody>
    </table>

@endsection

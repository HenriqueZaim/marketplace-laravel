@extends('layouts.app')

@section('content')

    <table class="table table-striped">
        <caption>Lista de lojas</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stores as $store)
                <tr>
                    <td>{{$store->id}}</td>
                    <td>{{$store->name}}</td>
                    <td>
                        <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm btn-default">Editar</a>
                        <a href="{{route('admin.stores.delete', ['store' => $store->id])}}" class="btn btn-sm btn-default">Deletar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="display: flex;">
        {{ $stores->links() }}
    </div>

@endsection

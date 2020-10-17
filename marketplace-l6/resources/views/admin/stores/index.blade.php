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
                        <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-default">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="display: flex;">
        {{ $stores->links() }}
    </div>

@endsection

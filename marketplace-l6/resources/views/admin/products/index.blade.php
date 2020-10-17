@extends('layouts.app')

@section('content')

    <a href="{{route('admin.products.create')}}" class="btn btn-primary">Criar produto</a>
    <table class="table table-striped">
        <caption>Lista de produtos</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->name}}</td>
                    <td>R${{$p->price}}</td>
                    <td>
                        <a href="{{route('admin.products.edit', ['product' => $p->id])}}" class="btn btn-sm btn-default">Editar</a>
                        <form action="{{route('admin.products.destroy', ['product' => $p->id])}}" method="POST">
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
        {{ $products->links() }}
    </div>

@endsection

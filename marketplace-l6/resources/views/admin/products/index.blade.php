@extends('layouts.app')

@section('content')

    <h1 >Lista de Produtos</h1>
    <hr>
    @if(is_null($store))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong><i class="fas fa-exclamation-circle mr-2" aria-hidden="true"></i>Nenhuma loja encontrada. <a href="{{route('admin.stores.create')}}">Crie uma agora!</a></strong>
        </div>

        <script>
          $(".alert").alert();
        </script>
    @else
    <a href="{{route('admin.products.create')}}" class="btn btn-primary mb-2">Criar produto</a>
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
            @if (is_null($products))
                <tr colspan="100%">
                    <td>Nenhum registro encontrado</td>
                </tr>
            @else
                @foreach($products as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->name}}</td>
                        <td>R${{$p->price}}</td>
                        <td class="btn-group">
                            <a href="{{route('admin.products.edit', ['product' => $p->id])}}" class="btn btn-sm btn-warning mr-2">Editar</a>
                            <form action="{{route('admin.products.destroy', ['product' => $p->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{$products->links()}}
    @endif
@endsection

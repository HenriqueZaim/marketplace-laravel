@extends('layouts.app')

@section('content')
    <h1>Cadastro de produto</h1>
    <form method="post" action="{{route('admin.products.store')}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Nome do produto</label>
            <input class="form-control" type="text" name="name" />
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input class="form-control" type="text" name="description" />
        </div>
        <div class="form-group">
            <textarea name="body" class="form-control" id="" cols="30" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Preço</label>
            <input class="form-control" type="text" name="price" />
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input class="form-control" type="text" name="slug" />
        </div>
        <div class="form-group">
            <label>Usuário</label>
            <select class="form-control" name="store">
                @foreach($stores as $store)
                    <option value="{{ $store->id }}" >{{ $store->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success" type="submit">Salvar</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Cadastro de loja</h1>
    <form method="post" action="{{route('admin.stores.update', ['store' => $store->id])}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Nome da loja</label>
            <input class="form-control" type="text" name="name" value="{{$store->name}}"/>
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input class="form-control" type="text" name="description" value="{{$store->description}}"/>
        </div>
        <div class="form-group">
            <label>Telefone</label>
            <input class="form-control" type="text" name="phone" value="{{$store->phone}}"/>
        </div>
        <div class="form-group">
            <label>Celular</label>
            <input class="form-control" type="text" name="mobile_phone" value="{{$store->mobile_phone}}"/>
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input class="form-control" type="text" name="slug" value="{{$store->slug}}"/>
        </div>
        <button class="btn btn-success" type="submit">Atualizar</button>
    </form>
@endsection

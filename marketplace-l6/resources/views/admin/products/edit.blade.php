@extends('layouts.app')

@section('content')
    <h1>Editar produto</h1>
    <form method="post" action="{{route('admin.products.update', ['product' => $product->id])}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        @method('PUT')
        <div class="form-group">
            <label>Nome do produto</label>
            <input class="form-control" type="text" name="name" value="{{$product->name}}"/>
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input class="form-control" type="text" name="description" value="{{$product->description}}"/>
        </div>
        <div class="form-group">
            <textarea name="body" class="form-control" id="" cols="30" rows="3" >{{$product->body}}</textarea>
        </div>
        <div class="form-group">
            <label>Preço</label>
            <input class="form-control" type="text" name="price" value="{{$product->price}}"/>
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input class="form-control" type="text" name="slug" value="{{$product->slug}}"/>
        </div>

        <button class="btn btn-success" type="submit">Editar</button>
    </form>
@endsection

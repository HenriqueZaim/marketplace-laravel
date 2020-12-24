@extends('layouts.app')

@section('content')
    @if (isset($product))
        <h1>Editar produto</h1>
    @else
        <h1>Cadastrar produto</h1>
    @endif
    <form enctype="multipart/form-data" method="post" action="{{isset($product) ? route('admin.products.update', ['product' => $product->id]) : route('admin.products.store')}}">
        @csrf
        @if (isset($product))
            @method('PUT')
        @endif
        <div class="form-group">
            <label>Nome do produto</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{isset($product) ? $product->name : old('name')}}"/>
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" value="{{isset($product) ? $product->description : old('description')}}"/>
            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="" cols="30" rows="3" >{{isset($product) ? $product->body : old('body')}}</textarea>
            @error('body')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Preço</label>
            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" value="{{isset($product) ? $product->price : old('price')}}"/>
            @error('price')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Categorias</label>
            <select name="categories[]" class="form-control" multiple id="">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                    @if(isset($product) && $product->categories->contains($category))
                        selected
                    @endif
                    >{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Imagem</label>
            <input type="file" name="photos[]" multiple class="form-control @error('photos.*') is-invalid @enderror">
            @error('photos.*')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        @if (isset($product))
            <button class="btn btn-primary" type="submit">Editar</button>
        @else
            <button class="btn btn-success" type="submit">Cadastrar</button>
        @endif
    </form>
    <hr>
    <div class="row">
        @if (isset($product))
            @foreach($product->photos as $photo)
                <div class="col-4">
                    <img src="{{asset('storage/' . $photo->image)}}" class="img-fluid" alt="">
                    <form method="post" action="{{route('admin.photo.remove')}}">
                        @csrf
                        <input type="hidden" name="image" value="{{$photo->image}}">
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </div>
            @endforeach
        @endif

    </div>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Cadastro de produto</h1>
    <form enctype="multipart/form-data" method="post" action="{{route('admin.products.store')}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Nome do produto</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}"/>
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}" type="text" name="description" />
            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="" cols="30" rows="3">{{old('body')}}</textarea>
            @error('body')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Preço</label>
            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" value="{{old('price')}}"/>
            @error('price')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Categorias</label>
            <select name="categories[]" class="form-control" multiple id="">
                @foreach($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Imagem</label>
            <input type="file" name="photos[]" multiple class="form-control">
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input class="form-control" type="text" name="slug" />
        </div>
        <button class="btn btn-success" type="submit">Salvar</button>
    </form>
@endsection

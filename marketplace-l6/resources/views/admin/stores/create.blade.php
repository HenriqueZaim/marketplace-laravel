@extends('layouts.app')

@section('content')
    <h1>Cadastro de loja</h1>
    <form method="post" action="{{route('admin.stores.store')}}">
        @csrf
        <div class="form-group">
            <label>Nome da loja</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}"/>
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" value="{{old('description')}}"/>
            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Telefone</label>
            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{old('phone')}}"/>
            @error('phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Celular</label>
            <input class="form-control @error('mobile_phone') is-invalid @enderror" type="text" name="mobile_phone" value="{{old('mobile_phone')}}"/>
            @error('mobile_phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
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

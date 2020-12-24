@extends('layouts.app')


@section('content')

    <div>
        @if (isset($category))
            <h1>Atualizar Categoria</h1>
        @else
            <h1>Cadastrar Categoria</h1>
        @endif
    </div>
    <form action="{{isset($category) ? route('admin.categories.update', ['category' => $category->id]) : route('admin.categories.store')}}"
        method="post">
        @csrf

        @if (isset($category))
            @method("PUT")
        @endif

        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($category) ? $category->name : old('name')}}">

            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control" value="{{ isset($category) ? $category->description : old('description')}}">
        </div>

        <div>
            @if (isset($category))
                <button type="submit" class="btn btn-lg btn-primary">Atualizar Categoria</button>
            @else
                <button type="submit" class="btn btn-lg btn-success">Cadastrar Categoria</button>
            @endif
        </div>
    </form>
@endsection

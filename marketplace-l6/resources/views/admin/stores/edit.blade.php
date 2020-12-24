@extends('layouts.app')

@section('content')
    @if (isset($store))
        <h1>Editar loja</h1>
    @else
        <h1>Cadastrar loja</h1>
    @endif
    <form method="post" enctype="multipart/form-data" action="{{isset($store) ? route('admin.stores.update', ['store' => $store->id]) : route('admin.stores.store')}}">
        @csrf
        @if (isset($store))
            @method('PUT')
        @endif

        <div class="form-group">
            <label>Nome</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{isset($store) ? $store->name : old('name')}}"/>
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" value="{{isset($store) ? $store->description : old('description')}}"/>
            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Telefone</label>
            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{isset($store) ? $store->phone : old('phone')}}"/>
            @error('phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Celular</label>
            <input class="form-control @error('mobile_phone') is-invalid @enderror" type="text" name="mobile_phone" value="{{isset($store) ? $store->mobile_phone : old('mobile_phone')}}"/>
            @error('mobile_phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            @if (isset($store))
                <img class="img-fluid w-25" src="{{asset('storage/'.$store->logo)}}" alt="{{$store->name}}">
            @endif

            <label for="">Imagem</label>
            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
            @error('logo')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        @if (isset($store))
            <button class="btn btn-primary" type="submit">Atualizar</button>
        @else
            <button class="btn btn-success" type="submit">Cadastrar</button>
        @endif
    </form>
@endsection

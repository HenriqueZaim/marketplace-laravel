@extends('layouts.app')

@section('content')
    <h1>Cadastro de loja</h1>
    <form method="post" action="{{route('admin.stores.store')}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Nome da loja</label>
            <input class="form-control" type="text" name="name" />
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input class="form-control" type="text" name="description" />
        </div>
        <div class="form-group">
            <label>Telefone</label>
            <input class="form-control" type="text" name="phone" />
        </div>
        <div class="form-group">
            <label>Celular</label>
            <input class="form-control" type="text" name="mobile_phone" />
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input class="form-control" type="text" name="slug" />
        </div>
        <div class="form-group">
            <label>Usuário</label>
            <select class="form-control" name="user">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" >{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success" type="submit">Salvar</button>
    </form>
@endsection

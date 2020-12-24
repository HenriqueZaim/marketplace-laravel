@extends('layouts.front')

@section('content')
    <div class="row">
        <div class="col-4">
            @if ($product->photos->count())
                <img class="card-img-top img-fluid" src="{{asset('storage/'.$product->photos->first()->image)}}" alt="">
                <div class="row mt-3">
                    @foreach ($product->photos as $photo)
                        <div class="col-2">
                            <img class="card-img-top img-fluid" src="{{asset('storage/'.$photo->image)}}" alt="">
                        </div>
                    @endforeach
                </div>
            @else
                <img class="card-img-top img-fluid" src="{{asset('assets/no-photo.jpg')}}" alt="">

            @endif
        </div>
        <div class="col-8">
            <h2>{{$product->name}}</h2>
            <p>{{$product->description}}</p>
            <h3>R$ {{number_format($product->price, '2', ',', '.')}}</h3>

            <span>Loja: {{$product->store->name}}</span>

            <div class="product-add">
                <hr>
                <form action="{{route('cart.add')}}" method="post">
                    @csrf
                    <input type="hidden" name="product[name]" value="{{$product->name}}">
                    <input type="hidden" name="product[price]" value="{{$product->price}}">
                    <input type="hidden" name="product[slug]" value="{{$product->slug}}">
                    <div class="form-group ">
                        <label for="number">Quantidade</label>
                        <input type="number" name="product[amount]" id="number" class="form-control col-2" value='1'>
                    </div>
                    <button type="submit" class="btn btn-lg btn-danger  float-left">Comprar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <hr>
            {{$product->body}}
        </div>
    </div>
@endsection

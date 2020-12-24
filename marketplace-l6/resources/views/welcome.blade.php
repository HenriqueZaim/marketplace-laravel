@extends('layouts.front')

@section('content')
    <div class="row mb-4">
    @foreach ($products as $key => $product)
            <div class="col-md-4">
                <div class="card" >
                    @if ($product->photos->count())
                        <img class="card-img-top" src="{{asset('storage/'.$product->photos->first()->image)}}" alt="">
                    @else
                        <img class="card-img-top" src="{{asset('assets/no-photo.jpg')}}" alt="">
                    @endif
                    <div class="card-body">
                        <h2 class="card-title">{{$product->name}}</h2>
                        <p class="card-text">{{$product->description}}</p>
                        <h3 class="text-success">R$ {{number_format($product->price, '2', ',', '.')}}</h3>
                        <a href="{{route('product.show', ['slug' => $product->slug])}}" class="btn btn-link float-right">Ver produto</a>
                    </div>
                </div>
            </div>
            @if (($key + 1) % 3 == 0)
            </div><div class="row">
            @endif
    @endforeach
    </div>
@endsection

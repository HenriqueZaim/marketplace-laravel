@extends('layouts.front')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Carrinho de compras</h2>
            <hr>
        </div>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                    <th>Ação</th>
                </thead>
                <tbody>
                    @if ($cart)
                        @php
                            $total = 0
                        @endphp
                        @foreach ($cart as $item)
                            @php
                                $sub_total = $item['price']*$item['amount'];
                                $total += $sub_total;
                            @endphp
                            <tr>
                                <td>{{$item['name']}}</td>
                                <td>R$ {{number_format($item['price'], 2, ',', '.')}}</td>
                                <td>{{$item['amount']}}</td>
                                <td>R$ {{number_format($sub_total, 2, ',', '.')}}</td>
                                <td>
                                    <a href="{{route('cart.remove', ['slug' => $item['slug']])}}" class="btn btn-sm btn-danger">Remover</a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-right">Total: </td>
                            <td colspan="2">R$ {{number_format($total, 2, ',', '.')}}</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="100%" class="text-center">Carrinho vazio.</td>
                        </tr>
                    @endif

                </tbody>
            </table>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <a href="" class="btn btn-lg btn-success float-right">Concluir compra</a>
                    <a href="{{route('cart.cancel')}}" class="btn btn-lg btn-danger float-left">Cancelar compra</a>
                </div>
            </div>
        </div>
    </div>
@endsection

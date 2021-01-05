@extends('layouts.front')

@section('content')
<form action="">
    <div class="container">
        <div class="row flex-column">
            <div class="col-md-6">
                <h1>Dados de pagamento</h1>
                <div class="form-group">
                    <label for="numeroCartao">Número do cartão <span class="brand"></span></label>
                    <input type="text" class="form-control" name="numeroCartao">
                    <input type="hidden" name="brand">
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-2">
                    <div class="form-group mb-0">
                        <label for="mesExp">Mês de expiração</label>
                        <input type="text" class="form-control" name="mesExp">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group mb-0">
                        <label for="anoExp">Ano de Expiração</label>
                        <input type="text" class="form-control" name="anoExp">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="codigoCartao">Código de segurança</label>
                    <input type="text" class="form-control" name="codigoCartao">
                </div>

                <div class="col-md-12 installments form-group">

                </div>
            </div>
            <div class="col">
                <button class="btn btn-success proccessCheckout">Efetuar pagamento</button>
            </div>

        </div>
    </div>
</form>
@endsection

@section('scripts')
    <script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script src="{{asset('js/jquery.ajax.min.js')}}"></script>
    <script>
        const sessionId = '{{session()->get("pagseguro_session-code")}}';
        PagSeguroDirectPayment.setSessionId(sessionId);

        const amountTransaction = '{{$cartItems}}'
        const cardNumber = document.querySelector('input[name="numeroCartao"');
        const brand = document.querySelector('span.brand');

        cardNumber.addEventListener('keyup', function(){
            if(cardNumber.value.length >= 6){
                PagSeguroDirectPayment.getBrand({
                    cardBin: cardNumber.value.substr(0,6),
                    success: function(resp){
                        let img = `<img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/${resp.brand.name}.png" alt="${resp.brand.name} logo" />`;
                        spanBrand.innerHTML = img;
                        document.querySelector('input[name=brand').value = resp.brand.name;
                        getInstallments(amountTransaction, resp.brand.name);
                    }
                });
            }
        });

        let submitButton = document.querySelector('button.proccessCheckout');
        submitButton.addEventListener('click', function(event){
            event.preventDefault();

            PagSeguroDirectPayment.createCardToken({
                cardNumber: document.querySelector('input[name=numeroCartao').value,
                brand: document.querySelector('input[name=brand').value,
                cvv: document.querySelector('input[name=codigoCartao').value,
                expirationMonth: document.querySelector('input[name=mesExp').value,
                expirationYear: document.querySelector('input[name=anoExp').value,
                success: function(resp){
                    proccessPayment(resp.card.token);
                }
            })
        });

        function proccessPayment(token){
            $.ajax({
                type: 'POST',
                url: '{{route("checkout.proccess")}}',
                data: {
                    token: token,
                    hash: PagSeguroDirectPayment.getSenderHash(),
                    installment: document.querySelector('select.installments').value,
                    _token: '{{csrf_token()}}'
                },
                datatype: 'json',
                success: function(resp){

                }
            })
        }

        function getInstallments(amount, brand){
            PagSeguroDirectPayment.getInstallments({
                amount: amount,
                brand: brand,
                maxInstallmentNoInterest: 0,
                success: function(resp){
                    let select = drawSelectInstallments(resp.installments[brand]);
                    document.querySelector('div.installments').innerHTML = select;
                },
                error: function(resp){

                }
            })
        }

        function drawSelectInstallments(installments) {
            let select = '<label>Opções de Parcelamento:</label>';

            select += '<select class="form-control installments" >';

            for(let l of installments) {
                select += `<option value="${l.quantity}|${l.installmentAmount}">${l.quantity}x de ${l.installmentAmount} - Total fica ${l.totalAmount}</option>`;
            }


            select += '</select>';

            return select;
        }
    </script>
@endsection



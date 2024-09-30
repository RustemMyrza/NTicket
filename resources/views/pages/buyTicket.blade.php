@extends('layouts.header')
@section('title', 'Мои билеты')

@section('content')
<style>
    .form-group {
        list-style-type: none;
        padding: 0;
    }
    .form-control-wrap {
        margin-bottom: 10px;
        cursor: move;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        padding: 10px;
    }
</style>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <h1 class="mb-4">{{ __('message.buyTicket.title') }}</h1>
            <p class="lead">{{ __('message.buyTicket.text') }}</p>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <form id="sortable-form" method="POST" action="{{ route('transaction') }}">
            <div class="container">
                <ul class="list-group">
                    @foreach($routes as $item)
                        <li class="list-group-item">
                            <input type="text" name="{{ $item->id }}" class="form-control" id="route_{{ $item->id }}" value="{{ $item->from_place . ' - ' . $item->to_place . ' || ' . $item->departure_time . ' - ' . $item->arrival_time . ' || ' . $item->getOrganization->name}}" readonly>
                        </li>
                    @endforeach
                </ul>
            </div>
            @csrf
            <div class="container">
                <div class="ticket-form">
                    <div class="form-group">
                        <label for="ticket-price">{{ __('message.buyTicket.inputLabels.price') }}</label>
                        <input type="text" class="form-control" id="ticket-price" value="{{ $price }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="ticket-quantity">{{ __('message.buyTicket.inputLabels.count') }}</label>
                        <input type="number" name="quantity" class="form-control" id="ticket-quantity" min="1" value="1">
                    </div>
                    <div class="form-group">
                        <label for="total-price">{{ __('message.buyTicket.inputLabels.sum') }}</label>
                        <input type="text" name="total_amount" class="form-control" id="total-price" value="{{ $price }}" readonly>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('message.buyTicket.buy') }}</button>
        </form>
        </div>
    </div>
</div>

<script>
    const pricePerTicketInput = document.getElementById('ticket-price');
    const quantityInput = document.getElementById('ticket-quantity');
    const totalPriceInput = document.getElementById('total-price');

    function calculateTotalPrice() {
        const pricePerTicket = parseFloat(pricePerTicketInput.value);
        const quantity = parseInt(quantityInput.value);
        const totalPrice = pricePerTicket * quantity;
        totalPriceInput.value = totalPrice.toFixed(2);
    }

    quantityInput.addEventListener('input', calculateTotalPrice);
</script>
<script src="{{ asset('js/cart.js') }}"></script>
@endsection
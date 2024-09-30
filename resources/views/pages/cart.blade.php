@extends('layouts.header')
@section('title', 'Мои билеты')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <h1 class="mb-4">{{ __('message.cart.title') }}</h1>
            <p class="lead">{{ __('message.cart.text') }}</p>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <form action="{{ route('buyTicket.page') }}" method="POST">
    @csrf
    @foreach($routes as $item)
    <div id="travelDetails">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="text-center w-100">{{ __('message.cart.card.title') }}</h5>
                <button type="button" class="btn btn-danger btn-sm" onclick="deleteRoute('{{ url('/cart/delete/' . $item->id) }}')">&times;</button>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    @if(isset($item->getRoute->getOrganization->transport_type))
                        @if($item->getRoute->getOrganization->transport_type == 1)
                            <img src="{{ url('storage/images/airplane.jpg') }}" alt="airplane" class="img-thumbnail">
                        @endif
                        @if($item->getRoute->getOrganization->transport_type == 2)
                            <img src="{{ url('storage/images/bus.jpg') }}" alt="bus" class="img-thumbnail">
                        @endif
                        @if($item->getRoute->getOrganization->transport_type == 3)
                            <img src="{{ url('storage/images/train.jpg') }}" alt="train" class="img-thumbnail">
                        @endif
                    @endif
                </div>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">{{ __('message.cart.card.info.from') }}</th>
                            <td>{{ isset($item->getRoute->from_place) ? Str::limit($item->getRoute->from_place, 25) : '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('message.cart.card.info.to') }}</th>
                            <td>{{ isset($item->getRoute->to_place) ? Str::limit($item->getRoute->to_place, 25) : '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('message.cart.card.info.departureTime') }}</th>
                            <td>{{ isset($item->getRoute->departure_time) ? Str::limit($item->getRoute->departure_time, 25) : '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('message.cart.card.info.arrivalTime') }}</th>
                            <td>{{ isset($item->getRoute->arrival_time) ? Str::limit($item->getRoute->arrival_time, 25) : '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('message.cart.card.info.price') }}</th>
                            <td>{{ isset($item->getRoute->price) ? Str::limit($item->getRoute->price, 25) : '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('message.cart.card.info.seats') }}</th>
                            <td>{{ isset($item->getRoute->seats_number) ? Str::limit($item->getRoute->seats_number, 25) : '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('message.cart.card.info.organizator') }}</th>
                            <td>{{ isset($item->getRoute->getOrganization->name) ? Str::limit($item->getRoute->getOrganization->name, 25) : '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('message.cart.card.info.transport.text') }}</th>
                            <td>
                                @if(isset($item->getRoute->getOrganization->transport_type))
                                    @if($item->getRoute->getOrganization->transport_type == 1)
                                        {{ __('message.cart.card.info.transport.type.airplane') }}
                                    @endif
                                    @if($item->getRoute->getOrganization->transport_type == 2)
                                        {{ __('message.cart.card.info.transport.type.bus') }}
                                    @endif
                                    @if($item->getRoute->getOrganization->transport_type == 3)
                                        {{ __('message.cart.card.info.transport.type.train') }}
                                    @endif
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group">
                                    <div class="form-check" style="display: flex; flex-direction:column; align-items:center;">
                                        <label class="form-check-label" for="{{isset($item->getRoute->id) ? $item->getRoute->id : 'route'}}">{{ __('message.cart.card.select') }}</label>
                                        <input class="form-check-input" type="checkbox" value="selected" id="travelCheckbox" name="{{ isset($item->getRoute->id) ? $item->getRoute->id : 'route' }}">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endforeach
    <button type="submit" class="btn btn-primary mt-3">{{ __('message.cart.card.submit') }}</button>
</form>
        </div>
    </div>
</div>

    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true" data-bs-success-message="{{ session('success_message') ? 'true' : 'false' }}">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">{{ __('message.cart.card.modal.title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                {{ session('success_message') }}
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('message.cart.card.modal.close') }}</button>
                </div>
            </div>
            </div>
        </div>
        <script>
    function deleteRoute(url) {
        var form = document.createElement('form');
        form.action = url;
        form.method = 'POST';
        form.innerHTML = `
            @csrf
            @method('DELETE')
        `;
        document.body.appendChild(form);
        form.submit();
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/cart.js') }}"></script>
@endsection
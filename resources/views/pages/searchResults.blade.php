@extends('layouts.header')
@section('title', 'Поиск')

@section('content')
<div class="serh">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="block">
                <form method="post" action="{{ route('search.route') }}" autocomplete="off" class="w-100">
 
                    <div class="mb-left"> 
                        @csrf
                      <label for="form_dates" class="form-label">{{ __('message.searchResults.form.inputs.from') }}</label>
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-map"></i></span>
                          <input type="text" id="sending" class="input-field" name="from_place" required>
                        </div>
                    </div>
                    <div class="mb-left">
                      <label for="form_dates" class="form-label">{{ __('message.searchResults.form.inputs.to') }}</label>
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-map"></i></span>
                          <input type="text" id="arriving" class="input-field" name="to_place" required>
                        </div>
                    </div>
                    <div class="mb-left">
                      <label for="form_dates" class="form-label">{{ __('message.searchResults.form.inputs.departureTime') }}</label>
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-date"></i></span>
                          <input type="text" id="departure_time" class="input-field datePicker" name="departure_time">
                          <a class="input-button" title="clear" data-clear>
                            <i class="icon-close"></i>
                          </a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary btn-lg btn-grad" type="submit">{{ __('message.searchResults.form.submit') }}</button>
                    </div>
                  </form>
                </div>
            </div>
            <div class="col-md-8">
              @if(isset($relevantRoutes))
                @if(count($relevantRoutes) > 0)
                @foreach($relevantRoutes as $item)
                <form action="{{ route('cart.add', ['routeId' => $item->id]) }}" method="POST">
                @csrf
                  <div class="card">
                  @if(isset($item->getOrganization->transport_type))
                    @if($item->getOrganization->transport_type == 1)
                      <img src="{{ url('storage/images/airplane.jpg') }}" class="card-img-top" alt="airplane">
                    @endif
                    @if($item->getOrganization->transport_type == 2)
                      <img src="{{ url('storage/images/bus.jpg') }}" class="card-img-top" alt="bus">
                    @endif
                    @if($item->getOrganization->transport_type == 3)
                      <img src="{{ url('storage/images/train.jpg') }}" class="card-img-top" alt="train">
                    @endif
                  @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ __('message.searchResults.route.title') }}</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>{{ __('message.searchResults.route.details.from') }}</strong> {{ isset($item->from_place) ? Str::limit($item->from_place, 25) : '' }}</li>
                            <li class="list-group-item"><strong>{{ __('message.searchResults.route.details.to') }}</strong> {{ isset($item->to_place) ? Str::limit($item->to_place, 25) : '' }}</li>
                            <li class="list-group-item"><strong>{{ __('message.searchResults.route.details.departureTime') }}</strong> {{ isset($item->departure_time) ? Str::limit($item->departure_time, 25) : '' }}</li>
                            <li class="list-group-item"><strong>{{ __('message.searchResults.route.details.arrivalTime') }}</strong> {{ isset($item->arrival_time) ? Str::limit($item->arrival_time, 25) : '' }}</li>
                            <li class="list-group-item"><strong>{{ __('message.searchResults.route.details.price') }}</strong> {{ isset($item->price) ? Str::limit($item->price, 25) : '' }}</li>
                            <li class="list-group-item"><strong>{{ __('message.searchResults.route.details.seats') }}</strong> {{ isset($item->seats_number) ? Str::limit($item->seats_number, 25) : '' }}</li>
                            <li class="list-group-item"><strong>{{ __('message.searchResults.route.details.organizator') }}</strong> {{ isset($item->getOrganization->name) ? Str::limit($item->getOrganization->name, 25) : '' }}</li>
                            <li class="list-group-item"><strong>{{ __('message.searchResults.route.details.transport.label') }}</strong>
                            @if(isset($item->getOrganization->transport_type))
                              @if($item->getOrganization->transport_type == 1)
                                {{ __('message.searchResults.route.details.transport.type.airplane') }}
                              @endif
                              @if($item->getOrganization->transport_type == 2)
                                {{ __('message.searchResults.route.details.transport.type.bus') }}
                              @endif
                              @if($item->getOrganization->transport_type == 3)
                                {{ __('message.searchResults.route.details.transport.type.train') }}
                              @endif
                            @endif
                            </li>
                        </ul>
                        <button type="submit" class="btn btn-primary">
                          <i class="bi bi-cart-fill"></i> {{ __('message.searchResults.route.button') }}
                        </button>
                    </div>
                  </div>
                </form>
                <!-- Модальное окно -->
                <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true" data-bs-success-message="{{ session('success_message') ? 'true' : 'false' }}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="cartModalLabel">{{ __('message.searchResults.modal.title') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        {{ session('success_message') }}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('message.searchResults.modal.close') }}</button>
                      </div>
                    </div>
                  </div>
                </div>


                  <br>
                @endforeach
                @else
                <h1 class="display-3 text-center mt-5 text-uppercase font-weight-bold text-danger">{{ __('message.searchResults.noRoutes') }}</h1>
                @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra_js')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  var segmentsDateSet = new Set(<?php echo json_encode($segmentsDate); ?>);
flatpickr(".datePicker", {
  altInput: true,
  altFormat: "F j, Y",
  dateFormat: "Y-m-d",
  minDate: "2024-01-01",
  maxDate: "2024-12-31",
  onDayCreate: function (dObj, dStr, fp, dayElem) {
    const months = {
      'January': '01',
      'February': '02',
      'March': '03',
      'April': '04',
      'May': '05',
      'June': '06',
      'July': '07',
      'August': '08',
      'September': '09',
      'October': '10',
      'November': '11',
      'December': '12',
    };

    const date = dayElem.getAttribute('aria-label').split(', ');
    const dayMonth = date[0].split(' '); 
    const month = months[dayMonth[0]]; 
    const year = date[1];

    const day = dayMonth[1].padStart(2, '0'); 
    const formattedDate = `${year}-${month}-${day}`;

    if (segmentsDateSet.has(formattedDate)) {
      dayElem.classList.add("good-day");
    }
  }
});



</script>
<script src="{{ asset('js/cart.js') }}"></script>
@endsection

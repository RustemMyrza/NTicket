@extends('layouts.header')
@section('title', 'Мои билеты')

@section('content')
<style>
	.footer{
		bottom: 0;
    	position: absolute;
    	width: 100%;
	}
</style>
<div class="my_tickets">
	<div class="container">
		<h1>{{ __('message.myTickets.title') }}</h1>
		@if (isset($routes))
			@if (count($routes) > 0)
				@foreach($routes as $item)
				<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
		        <div class="trg _mb-10 _b-n trg-rounded trg-">
				<div class="trg-preview"> 
					@foreach($item as $item1) 
						<div class="row" data-gutter="20">
						<div class="col-md-10 ">
							<div class="trg-flight-sections">
							<div class="trg-flight-section">
								<div class="row row-no-gutter row-eq-height">
								<div class="col-md-12 ">
									<div class="trg-flight-section-item">
									<div class="row">
										<div class="col-md-3 ">
										<div class="trg-flight-section-meta">
											<p class="trg-flight-section-meta-time">{{explode(' ', $item1->departure_time)[1]}} </p>
											<p class="trg-flight-section-meta-city">{{$item1->from_place}}</p>
											<p class="trg-flight-section-meta-date">{{explode(' ', $item1->departure_time)[0]}}</p>
										</div>
										</div>
										<div class="col-md-6 ">
										<div class="trg-flight-section-path">
											<div class="trg-flight-section-path-line"></div>
											<div class="trg-flight-section-path-line-start"> <i class="bi bi-arrow-right-short trg-flight-section-path-icon"></i>
											<div class="trg-flight-section-path-line-dot"></div>
											<div class="trg-flight-section-path-line-title">{{$item1->from_place}}</div>
											</div>
											<div class="trg-flight-section-path-line-end"> <i class="bi bi-arrow-down-short trg-flight-section-path-icon"></i>
											<div class="trg-flight-section-path-line-dot"></div>
											<div class="trg-flight-section-path-line-title">{{$item1->to_place}}</div>
											</div>
										</div>
										</div>
										<div class="col-md-3 ">
										<div class="trg-flight-section-meta">
											<p class="trg-flight-section-meta-time">{{explode(' ', $item1->arrival_time)[1]}}</p>
											<p class="trg-flight-section-meta-city">{{$item1->to_place}}</p>
											<p class="trg-flight-section-meta-date">{{explode(' ', $item1->arrival_time)[0]}}</p>
										</div>
										</div>
									</div>
									</div>
								</div>
								</div>
							</div>
							</div>
						</div>
						<div class="col-md-2 ">
							<div class="trg-book">
							<div class="trg-price">
								<p class="trg-price-tag">{{$item1->price}} {{ __('message.myTickets.currency') }}</p>
							</div>
					
							</div>
						</div>
						</div>
						<br>
						<br>
					@endforeach
					</div>
		        </div>
		    </div>
		</div>
				@endforeach
			@else
				<div class="container mt-5">
					<h1 class="display-4 text-center">{{ __('message.myTickets.noTickets') }}</h1>
				</div>
			@endif
		@else
		<div class="container mt-5">
        	<h1 class="display-4 text-center">{{ __('message.myTickets.noTickets') }}</h1>
    	</div>
		@endif
	</div>	
</div>
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true" data-bs-success-message="{{ session('success_message') ? 'true' : 'false' }}">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">{{ __('message.myTickets.modal.title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                {{ session('success_message') }}
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('message.myTickets.modal.close') }}</button>
                </div>
            </div>
            </div>
        </div>
        <script src="{{ asset('js/cart.js') }}"></script>
@endsection
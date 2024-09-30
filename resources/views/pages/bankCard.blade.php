@extends('layouts.header')
@section('title', 'Профиль')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0"> {{ __('message.bankCard.title') }} </h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('profile.bankCard.update') }}">
            @csrf
            <div class="form-group">
              <label for="name">{{ __('message.bankCard.inputs.fullName.label') }}</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('message.bankCard.inputs.fullName.placeholder') }}" value="{{ isset($bankCardData->name) ? $bankCardData->name : '' }}">
            </div>
            <div class="form-group">
              <label for="number">{{ __('message.bankCard.inputs.number.label') }}</label>
              <input type="number" class="form-control" name="number" id="number" placeholder="{{ __('message.bankCard.inputs.number.placeholder') }}"   value="{{ isset($bankCardData->number) ? $bankCardData->number : '' }}">
            </div>
            <div class="form-group">
              <label for="cvv">{{ __('message.bankCard.inputs.cvv.label') }}</label>
              <input type="number" class="form-control" name="cvv" id="cvv" placeholder="{{ __('message.bankCard.inputs.cvv.placeholder') }}"   value="{{ isset($bankCardData->cvv) ? $bankCardData->cvv : '' }}">
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-block mb-2">{{ __('message.bankCard.buttons.submit') }}</button>
                    </div>
                    <div class="col-md-4">
                    <a href="{{ route('tickets.profile') }}" class="btn btn-success btn-block mb-2">{{ __('message.bankCard.buttons.profile') }}</a>
                    </div>
                    <div class="col-md-4">
                    <a href="{{ route('profile.idCard') }}" class="btn btn-success btn-block mb-2">{{ __('message.bankCard.buttons.idCard') }}</a>
                    </div>
                </div>
            </div>
        </form>
        <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true" data-bs-success-message="{{ session('success_message') ? 'true' : 'false' }}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="cartModalLabel">{{ __('message.bankCard.modal.title') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        {{ session('success_message') }}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('message.bankCard.modal.close') }}</button>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/cart.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
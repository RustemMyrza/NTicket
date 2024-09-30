@extends('layouts.header')
@section('title', 'Профиль')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">{{ __('message.idCard.title') }}</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('profile.idCard.update') }}">
            @csrf
            <div class="form-group">
              <label for="name">{{ __('message.idCard.inputs.name.label') }}</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('message.idCard.inputs.name.placeholder') }}" value="{{ isset($idCardData->name) ? $idCardData->name : '' }}">
            </div>
            <div class="form-group">
              <label for="surname">{{ __('message.idCard.inputs.surname.label') }}</label>
              <input type="text" class="form-control" name="surname" id="surname" placeholder="{{ __('message.idCard.inputs.surname.placeholder') }}"  value="{{ isset($idCardData->surname) ? $idCardData->surname : '' }}">
            </div>
            <div class="form-group">
              <label for="middle_name">{{ __('message.idCard.inputs.middleName.label') }}</label>
              <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="{{ __('message.idCard.inputs.middleName.placeholder') }}"   value="{{ isset($idCardData->middle_name) ? $idCardData->middle_name : '' }}">
            </div>
            <div class="form-group">
              <label for="iin">{{ __('message.idCard.inputs.iin.label') }}</label>
              <input type="number" class="form-control" name="iin" id="iin" placeholder="{{ __('message.idCard.inputs.iin.placeholder') }}"   value="{{ isset($idCardData->iin) ? $idCardData->iin : '' }}">
            </div>
            <div class="form-group">
              <label for="number">{{ __('message.idCard.inputs.number.label') }}</label>
              <input type="number" class="form-control" name="number" id="number" placeholder="{{ __('message.idCard.inputs.number.placeholder') }}"   value="{{ isset($idCardData->number) ? $idCardData->number : '' }}">
            </div>
            <div class="form-group">
              <label for="birth_date">{{ __('message.idCard.inputs.birthDate.label') }}</label>
              <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ isset($idCardData->birth_date) ? $idCardData->birth_date : '' }}">
            </div>
            <div class="form-group">
              <label for="nationality">{{ __('message.idCard.inputs.nationality.label') }}</label>
              <input type="text" class="form-control" id="nationality" name="nationality" placeholder="{{ __('message.idCard.inputs.nationality.placeholder') }}" value="{{ isset($idCardData->nationality) ? $idCardData->nationality : '' }}">
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-block mb-2">{{ __('message.idCard.buttons.submit') }}</button>
                    </div>
                    <div class="col-md-4">
                    <a href="{{ route('tickets.profile') }}" class="btn btn-success btn-block mb-2">{{ __('message.idCard.buttons.profile') }}</a>
                    </div>
                    <div class="col-md-4">
                    <a href="{{ route('profile.bankCard') }}" class="btn btn-success btn-block mb-2">{{ __('message.idCard.buttons.bankCard') }}</a>
                    </div>
                </div>
            </div>
        </form>
        <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true" data-bs-success-message="{{ session('success_message') ? 'true' : 'false' }}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="cartModalLabel">{{ __('message.idCard.modal.title') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        {{ session('success_message') }}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('message.idCard.modal.close') }}</button>
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
@extends('layouts.header')
@section('title', 'Профиль')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">{{ __('message.profile.title') }}</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('update.profile') }}">
            @csrf
            <div class="form-group">
              <label for="name">{{ __('message.profile.inputs.name.label') }}</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('message.profile.inputs.name.placeholder') }}" value="{{ isset($userData->name) ? $userData->name : '' }}">
            </div>
            <div class="form-group">
              <label for="surname">{{ __('message.profile.inputs.surname.label') }}</label>
              <input type="text" class="form-control" name="surname" id="surname" placeholder="{{ __('message.profile.inputs.surname.placeholder') }}"  value="{{ isset($userData->surname) ? $userData->surname : '' }}">
            </div>
            <div class="form-group">
              <label for="middle_name">{{ __('message.profile.inputs.middleName.label') }}</label>
              <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="{{ __('message.profile.inputs.middleName.placeholder') }}"   value="{{ isset($userData->middle_name) ? $userData->middle_name : '' }}">
            </div>
            <div class="form-group">
              <label for="email">{{ __('message.profile.inputs.email.label') }}</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('message.profile.inputs.email.placeholder') }}" value="{{ isset($userData->email) ? $userData->email : '' }}">
            </div>
            <div class="form-group">
              <label for="fullName">{{ __('message.profile.inputs.birthDate.label') }}</label>
              <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ isset($userData->birth_date) ? $userData->birth_date : '' }}">
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-block mb-2">{{ __('message.profile.buttons.submit') }}</button>
                    </div>
                    <div class="col-md-4">
                    <a href="{{ route('profile.idCard') }}" class="btn btn-success btn-block mb-2">{{ __('message.profile.buttons.idCard') }}</a>
                    </div>
                    <div class="col-md-4">
                    <a href="{{ route('profile.bankCard') }}" class="btn btn-success btn-block mb-2">{{ __('message.profile.buttons.bankCard') }}</a>
                    </div>
                </div>
            </div>
        </form>
        <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true" data-bs-success-message="{{ session('success_message') ? 'true' : 'false' }}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="cartModalLabel">{{ __('message.profile.modal.title') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        {{ session('success_message') }}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('message.profile.modal.close') }}</button>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true" data-bs-success-message="{{ session('success_message') ? 'true' : 'false' }}">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Покупка не удалась</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                {{ session('success_message') }}
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
            </div>
        </div>
        <script src="{{ asset('js/cart.js') }}"></script> 
<script src="{{ asset('js/cart.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@extends('layouts.header')
@section('title', 'Помощь')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <h1 class="mb-4">{{ __('message.chatHelp.title') }}</h1>
            <p class="lead">{{ __('message.chatHelp.text') }}</p>
        </div>
    </div>
</div>
<div class="container mt-5">
    <h1 class="text-center mb-4">{{ __('message.chatHelp.form.title') }}</h1>
    <form class="question-form" method="POST" action="{{ route('question.create') }}">
        @csrf
      <div class="form-group">
        <label for="question">{{ __('message.chatHelp.form.label') }}</label>
        <textarea class="form-control" id="question" rows="5" placeholder="{{ __('message.chatHelp.form.placeholder') }}" name="question"></textarea>
      </div>
      <input type="text" name="user" id="user" value="{{ Auth::user()->id }}" style="display: none;">
      <button type="submit" class="btn btn-primary">{{ __('message.chatHelp.form.submit') }}</button>
    </form>
  </div>
  <div class="container mt-5">
    <div class="accordion" id="accordionExample">
    @if(isset($chatHelp) && count($chatHelp) > 0)
    @foreach($chatHelp as $item)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $loop->index }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}" aria-expanded="false" aria-controls="collapse{{ $loop->index }}">
                    {{ $item->question }}
                </button>
            </h2>
            <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    {{ $item->answer ? $item->answer : __('message.chatHelp.noAnswer') }}
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="alert alert-info text-center" role="alert">
        <h1 class="display-4">{{ __('message.chatHelp.noQuestionTitle') }}</h1>
    </div>
@endif

    </div>
</div>
  <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true" data-bs-success-message="{{ session('success_message') ? 'true' : 'false' }}">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">{{ __('message.chatHelp.modal.title') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                {{ session('success_message') }}
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('message.chatHelp.modal.close') }}</button>
                </div>
            </div>
            </div>
        </div>
        <script src="{{ asset('js/cart.js') }}"></script>
  <!-- Подключаем jQuery -->
@endsection
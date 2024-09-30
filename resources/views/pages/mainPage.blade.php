@extends('layouts.header')

@section('title', __('message.mainPage.pageTitle'))

@section('content')
<style>
  .animate {
    opacity: 0;
    transform: translateY(-20px);
    transition: opacity 0.6s ease-out, transform 0.6s ease-out;
  }

  .animate.visible {
    opacity: 1;
    transform: translateY(0);
  }
  .slider-section {
    background-color: white;
  }

  .custom-hr {
    border-color: #000000;
  }

  .text-shadow {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  }

  .carousel-caption {
    background: rgba(0, 0, 0, 0.6);
    padding: 20px;
    border-radius: 10px;
    transition: background 0.3s ease;
  }

  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    filter: invert(1);
  }

  .carousel-item img {
    transition: transform 0.5s ease, opacity 0.5s ease;
  }

  .carousel-item:hover img {
    transform: scale(1.05);
    opacity: 0.9;
  }

  .carousel-indicators [data-bs-target] {
    background-color: #ffffff;
  }

  .carousel-indicators .active {
    background-color: #f8f9fa;
    border-color: #ffffff;
  }

  .carousel-control-prev,
  .carousel-control-next {
    width: 5%;
  }
</style>


<div class="banner animate">
    <div class="container text-center text-white" id="banner">
        <h1 class="mt-4 mb-6">{{ __('message.mainPage.banner.title') }}</h1>
        <p class="mb-10 fs-18">
        {{ __('message.mainPage.banner.text') }}
        </p>
    </div>
</div>


<hr>
<section class="section-space">
  <div class="section-space--sm-bottom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xxl-6">
          <div class="text-center">
            <h2 class="mt-4 mb-4">{{ __('message.mainPage.guide.title') }}</h2>
            <p>{{ __('message.mainPage.guide.text') }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6 col-lg-4">
        <div class="border border-neutral-40 rounded-4 p-8 bg-neutral-0 text-center h-100 animate">
          <div class="d-inline-block position-relative">
            <img src="{{ asset('storage/images/work-process-icon-1.png') }}" alt="image" class="img-fluid">
            <span class="d-grid place-content-center w-10 h-10 rounded-circle bg-primary-300 clr-neutral-0 position-absolute top-0 left-0">
              <span class="h4 m-0">1</span>
            </span>
          </div>
          <h3 class="mt-3 mb-3">{{ __('message.mainPage.guide.points.search.title') }}</h3>
          <p class="mb-0">{{ __('message.mainPage.guide.points.search.text') }}</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="border border-neutral-40 rounded-4 p-8 bg-neutral-0 text-center h-100 animate">
          <div class="d-inline-block position-relative">
            <img src="{{ asset('storage/images/work-process-icon-2.png') }}" alt="image" class="img-fluid">
            <span class="d-grid place-content-center w-10 h-10 rounded-circle bg-primary-300 clr-neutral-0 position-absolute top-0 left-0">
              <span class="h4 m-0">2</span>
            </span>
          </div>
          <h3 class="mt-3 mb-3">{{ __('message.mainPage.guide.points.booking.title') }}</h3>
          <p class="mb-0">{{ __('message.mainPage.guide.points.booking.text') }}</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="border border-neutral-40 rounded-4 p-8 bg-neutral-0 text-center h-100 animate">
          <div class="d-inline-block position-relative">
            <img src="{{ asset('storage/images/work-process-icon-3.png') }}" alt="image" class="img-fluid">
            <span class="d-grid place-content-center w-10 h-10 rounded-circle bg-primary-300 clr-neutral-0 position-absolute top-0 left-0">
              <span class="h4 m-0">3</span>
            </span>
          </div>
          <h3 class="mt-3 mb-3">{{ __('message.mainPage.guide.points.payment.title') }}</h3>
          <p class="mb-0">{{ __('message.mainPage.guide.points.payment.text') }}</p>
        </div>
      </div>
    </div>
  </div>
</section>





<section class="section-space pt-1 pb-2 slider-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-xxl-6 text-center">
        <h2 class="mt-4 mb-4 text-black">{{ __('message.mainPage.advantage.title') }}</h2>
      </div>
    </div>
    <hr class="custom-hr">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('storage/images/advantage_1.jpg') }}" class="d-block mx-auto w-50" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="text-white text-shadow">{{ __('message.mainPage.advantage.points.hybrid.title') }}</h5>
            <p class="text-white text-shadow">{{ __('message.mainPage.advantage.points.hybrid.text') }}</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('storage/images/advantage_2.jpg') }}" class="d-block mx-auto w-50" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="text-white text-shadow">{{ __('message.mainPage.advantage.points.search.title') }}</h5>
            <p class="text-white text-shadow">{{ __('message.mainPage.advantage.points.search.text') }}</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('storage/images/advantage_3.jpg') }}" class="d-block mx-auto w-50" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="text-white text-shadow">{{ __('message.mainPage.advantage.points.comfort.title') }}</h5>
            <p class="text-white text-shadow">{{ __('message.mainPage.advantage.points.comfort.text') }}</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('storage/images/advantage_4.jpg') }}" class="d-block mx-auto w-50" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="text-white text-shadow">{{ __('message.mainPage.advantage.points.money.title') }}</h5>
            <p class="text-white text-shadow">{{ __('message.mainPage.advantage.points.money.text') }}</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>




<section class="section-space animate">
  <div class="section-space--sm-bottom">
    <div class="container">
      <div class="row">
        <div class="col animate" style="display: flex; justify-content: center; align-items: center; text-align: center">
          <div style="width: 100%;">
            <h2>{{ __('message.mainPage.request.title') }}</h2>
            <p>{{ __('message.mainPage.request.text') }}</p>
          </div>
        </div>
        <div class="col animate">
          <div style="width: 100%; display: flex; align-items: center; flex-direction:column">
            <form action="{{ route('request.create') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">{{ __('message.mainPage.request.inputs.name.label') }}</label>
                <input type="text" id="name" class="input-field" placeholder="{{ __('message.mainPage.request.inputs.name.placeholder') }}" name="name" required>
              </div>
              <div class="form-group">
                <label for="phone">{{ __('message.mainPage.request.inputs.phone.label') }}</label>
                <input type="tel" id="phone" class="input-field" placeholder="{{ __('message.mainPage.request.inputs.phone.placeholder') }}" name="phone" required>
              </div>
              <button type="submit" class="submit-button">{{ __('message.mainPage.request.submit') }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="mission">
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-md-6 d-flex align-items-center text-center">
        <div class="p-5">
          <h2>{{ __('message.mainPage.mission.title') }}</h2>
          <p>{{ __('message.mainPage.mission.text') }}</p>
        </div>
      </div>
      <div class="col-md-6">
        <img src="{{ asset('storage/images/mission_image.jpg') }}" alt="Travel Planning" class="img-fluid w-100 h-100">
      </div>
    </div>
  </div>
</section>


<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true" data-bs-success-message="{{ session('success_message') ? 'true' : 'false' }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cartModalLabel">{{ __('message.mainPage.modal.title') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{ session('success_message') }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('message.mainPage.modal.close') }}</button>
        </div>
      </div>
    </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1
    });

    document.querySelectorAll('.animate').forEach(el => {
      observer.observe(el);
    });
  });

  document.addEventListener("DOMContentLoaded", function() {
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, {
      threshold: 0.1
    });

    document.querySelectorAll('.animate').forEach(el => {
      observer.observe(el);
    });
  });
</script>

        <script src="{{ asset('js/cart.js') }}"></script>
@endsection

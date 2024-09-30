<footer class="bg-dark text-light py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>NTicket</h5>
                <p>{{ __('message.footer.slogan') }}</p>
            </div>
            <div class="col-md-6">
                <h5>{{ __('message.footer.navigationTitle') }}</h5>
                <ul class="nav flex-row">
                  <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('tickets.home') }}">{{ __('message.navbar.main') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('tickets.my_tickets') }}">{{ __('message.navbar.myTickets') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('tickets.search_results') }}">{{ __('message.navbar.search') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('tickets.chat_help') }}">{{ __('message.navbar.help') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('tickets.profile') }}">{{ __('message.navbar.profile') }}</a>
                  </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                <p class="text-center text-light">{{ __('message.footer.copyright') }}</p>
            </div>
        </div>
    </div>
</footer>

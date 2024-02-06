<nav class="navbar navbar-expand-lg navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
  <div class="container">
    <a href="/index.html" class="navbar-brand">
      <img src="/images/logo.svg" alt="Logo" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse bg-white" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('categories') }}" class="nav-link">Categories</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Rewards</a>
        </li>
        @guest
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('login') }}" class="btn btn-success px-4 text-white">Sign In
            </a>
          </li>
        @endguest
      </ul>

      @auth
        <!-- Desktop Menu -->
        <ul class="navbar-nav d-none d-lg-flex">
          <!-- Profile -->
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown">
              <img src="/images/icon-user.png" class="rounded-circle profile-picture me-2" />
              Hi, {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
              <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
              <a href="{{ route('dashboard-settings-account') }}" class="dropdown-item">
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" href="route('logout')"
                  onclick="event.preventDefault();
                    this.closest('form').submit();">
                  {{ __('Logout') }}
                </a>
              </form>
            </ul>
          </li>
          <!-- Cart -->
          <li class="nav-item">
            <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
              @php
                $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
              @endphp
              @if ($carts > 0)
                <img src="/images/icon-cart-filled.svg" alt="" />
                <div class="card-badge">{{ $carts }}</div>
              @else
                <img src="/images/icon-cart-empty.svg" alt="" />
              @endif
            </a>
          </li>
        </ul>

        <!-- Mobile Menu -->
        <ul class="navbar-nav d-block d-lg-none">
          <li class="nav-item">
            <a href="#" class="nav-link">Hi, {{ Auth::user()->name }}</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link d-inline-block">Cart</a>
          </li>
        </ul>
      @endauth
    </div>
  </div>
</nav>

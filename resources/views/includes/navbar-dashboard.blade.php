<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
  <div class="container-fluid">
    <button class="btn btn-secondary d-md-none me-auto" id="menu-toggle">
      &laquo; Menu
    </button>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarSupportedContent">
      <!-- Desktop Menu -->
      <ul class="navbar-nav d-none d-lg-flex ms-auto">
        <!-- Profile -->
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown">
            <img src="/images/icon-user.png" class="rounded-circle profile-picture me-2" />
            Hi, {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu">
            <a href="/dashboard.html" class="dropdown-item">Dashboard</a>
            <a href="/dashboard-account.html" class="dropdown-item">Settings
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
    </div>
  </div>
</nav>

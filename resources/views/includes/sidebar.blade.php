<div class="border-right" id="sidebar-wrapper">
  <!-- Logo -->
  <div class="sidebar-heading text-center">
    <img src="/images/dashboard-store-logo.svg" alt="Logo" class="my-4" />
  </div>
  <!-- List Group -->
  <div class="list-group list-group-flush">
    <!-- Dashboard -->
    <a href="{{ route('dashboard') }}"
      class="list-group-item list-group-item-action {{ request()->is('dashboard') ? 'active' : '' }}">
      Dashboard
    </a>
    <!-- My Products -->
    <a href="{{ route('dashboard-products') }}"
      class="list-group-item list-group-item-action {{ request()->is('dashboard/products*') ? 'active' : '' }}">
      My Products
    </a>
    <!-- Transactions -->
    <a href="{{ route('dashboard-transaction') }}"
      class="list-group-item list-group-item-action {{ request()->is('dashboard/transactions*') ? 'active' : '' }}">
      Transactions
    </a>
    <!-- Store Settings -->
    <a href="{{ route('dashboard-settings-store') }}"
      class="list-group-item list-group-item-action {{ request()->is('dashboard/settings*') ? 'active' : '' }}">
      Store Settings
    </a>
    <!-- My Account -->
    <a href="{{ route('dashboard-settings-account') }}"
      class="list-group-item list-group-item-action {{ request()->is('dashboard/account*') ? 'active' : '' }}">
      My Account
    </a>
    {{-- Sign Out --}}
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <a href="{{ route('logout') }}" class="list-group-item list-group-item-action"
        onclick="event.preventDefault(); this.closest('form').submit();">
        Sign Out
      </a>
    </form>
  </div>
</div>

<form method="POST" action="{{ route('logout') }}">
  @csrf
</form>

<div class="border-right" id="sidebar-wrapper">
  <!-- Logo -->
  <div class="sidebar-heading text-center">
    <img src="/images/admin.png" alt="Logo" class="my-4" style="max-width: 150px" />
  </div>
  <!-- List Group -->
  <div class="list-group list-group-flush">
    <!-- Dashboard -->
    <a href="{{ route('admin-dashboard') }}"
      class="list-group-item list-group-item-action {{ request()->is('admin') ? 'active' : '' }}">
      Dashboard
    </a>
    <!-- Products -->
    <a href="{{ route('product.index') }}"
      class="list-group-item list-group-item-action {{ request()->is('admin/product') ? 'active' : '' }}">
      Products
    </a>
    <!-- Galleries -->
    <a href="{{ route('product-gallery.index') }}"
      class="list-group-item list-group-item-action {{ request()->is('admin/product-gallery*') ? 'active' : '' }}">
      Galleries
    </a>
    <!-- Categories -->
    <a href="{{ route('category.index') }}"
      class="list-group-item list-group-item-action {{ request()->is('admin/category*') ? 'active' : '' }}">
      Categories
    </a>
    <!-- Transactions -->
    <a href="#" class="list-group-item list-group-item-action">
      Transactions
    </a>
    <!-- Users -->
    <a href="{{ route('user.index') }}"
      class="list-group-item list-group-item-action {{ request()->is('admin/user*') ? 'active' : '' }}">
      Users
    </a>
    <!-- Sign Out -->
    <a href="{{ route('home') }}" class="list-group-item list-group-item-action">
      Sign Out
    </a>
  </div>
</div>

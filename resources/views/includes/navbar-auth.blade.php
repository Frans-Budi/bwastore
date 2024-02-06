<nav class="navbar navbar-expand-lg navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
    <a href="{{ route('home') }}" class="navbar-brand">
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
        </ul>
    </div>
    </div>
</nav>

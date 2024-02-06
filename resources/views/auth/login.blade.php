@extends('layouts.auth')

@section('content')
  <div class="page-content page-auth">
    <div class="section-store-auth" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center row-login">
          <div class="col-lg-6 text-center">
            <img src="/images/login-placeholder.png" class="w-50 mb-lg-0 mb-4" />
          </div>
          <div class="col-lg-5">
            <h2>Belanja kebutuhan utama,<br />menjadi lebih mudah</h2>
            <form method="POST" class="mt-3" action="{{ route('login') }}">
              @csrf
              <div class="form-group mb-3">
                <label for="" class="form-label">Email Address</label>
                <x-text-input id="email" class="form-control w-75" type="email" name="email" :value="old('email')"
                  required autofocus autocomplete="username" />
                
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>
              <div class="form-group mb-3">
                <label for="" class="form-label">Password</label>
                <x-text-input id="password" class="form-control w-75" type="password" name="password" required
                  autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>
              <button type="submit" class="btn btn-success w-75 mb-2">Sign In to My Account
              </button>
              <a href="{{ route('register') }}" class="btn btn-signup w-75">Sign Up
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email Address -->
      <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required
          autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required
          autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <!-- Remember Me -->
      <div class="mt-4 block">
        <label for="remember_me" class="inline-flex items-center">
          <input id="remember_me" type="checkbox"
            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
            name="remember">
          <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
        </label>
      </div>

      <div class="mt-4 flex items-center justify-end">
        @if (Route::has('password.request'))
          <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
            href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
          </a>
        @endif

        <x-primary-button class="ms-3">
          {{ __('Log in') }}
        </x-primary-button>
      </div>
    </form>
  </x-guest-layout> --}}
@endsection

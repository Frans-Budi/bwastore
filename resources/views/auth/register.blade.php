@extends('layouts.auth')

@section('content')
  <div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center justify-content-center row-login">
          <div class="col-lg-4">
            <h2>Memulai untuk jual beli<br />dengan cara terbaru</h2>
            <form method="POST" class="mt-3" action="{{ route('register') }}">
              @csrf
              <!-- Full Name -->
              <div class="form-group mb-3">
                <label for="" class="form-label">Full Name</label>
                <x-text-input id="name" class="form-control" type="text" name="name" v-model="name" required
                  autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
              </div>
              <!-- Email -->
              <div class="form-group mb-3">
                <label for="" class="form-label">Email Address</label>
                <input id="email" class="form-control" type="email" name="email" v-model="email" required
                  autocomplete="email" @change="checkEmailAvailability()"
                  :class="{ 'is-invalid': this.email_unavailable }" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>
              <!-- Password -->
              <div class="form-group mb-3">
                <label for="" class="form-label">Password</label>
                <x-text-input id="password" class="form-control" type="password" name="password" required
                  autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>
              <!-- Password Confirm -->
              <div class="form-group mb-3">
                <label for="" class="form-label">Konfirmasi Password</label>
                <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                  required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
              </div>
              <!-- Open Store? -->
              <div class="form-group mb-3">
                <label for="" class="form-label">Store</label>
                <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
                <!-- Iya Boleh -->
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="is_store_open" id="openStoreTrue"
                    v-model="is_store_open" :value="true" />
                  <label class="form-check-label" for="openStoreTrue">
                    Iya Boleh
                  </label>
                </div>
                <!-- Enggak, Makasih -->
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="is_store_open" id="openStoreFalse"
                    v-model="is_store_open" :value="false" />
                  <label class="form-check-label" for="openStoreFalse">
                    Enggak, Makasih
                  </label>
                </div>
              </div>
              <!-- Nama Toko -->
              <div class="form-group mb-3" v-if="is_store_open">
                <label for="" class="form-label">Nama Toko</label>
                <x-text-input type="text" v-model="store_name" id="store_name" name="store_name" class="form-control"
                  autofocus autocomplete="store_name" />
                <x-input-error :messages="$errors->get('store_name')" class="mt-2" />
              </div>
              <!-- Kategori -->
              <div class="form-group mb-3" v-if="is_store_open">
                <label for="" class="form-label">Kategori</label>
                <select name="categories_id" class="form-select">
                  <option value="" disabled selected>Select Category</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>

              <button type="submit" class="btn btn-success w-100 mb-2" :disabled="this.email_unavailable">
                Sign Up to My Account
              </button>
              <a href="{{ route('login') }}" class="btn btn-signup d-block">
                Back to Sign In
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Toast -->
    <transition name="toast" mode="out-in">
      {{-- <error-message v-if="is_show_toasted" :message="sfsadf"></error-message> --}}
      <div class="errorMessage" :style="{ 'background-color': toast_bg_color }" v-if="is_show_toasted">
        <p>@{{ toast_message }}</P>
      </div>
    </transition>
  </div>
@endsection

@push('prepend-script')
  <!-- Toast -->
  <div id="toast">
    <transition name="toast" mode="out-in">
      <error-message></error-message>
    </transition>
  </div>
@endpush

@push('addon-script')
  <script src="/node_modules/vue/dist/vue.global.js"></script>
  <script src="/node_modules/axios/dist/axios.min.js"></script>
  <script type="module">
    const register = Vue.createApp({
      mounted() {
        AOS.init();
      },
      methods: {
        checkEmailAvailability() {
          var self = this;
          axios.get("{{ route('api-register-check') }}", {
              params: {
                email: this.email,
              },
            })
            .then(function(response) {
              if (response.data == "Available") {
                self.showToasted("Email Anda tersedia! Silahkan lanjut langkah selanjutnya", "#29A867");
              } else {
                self.showToasted("Maaf, tampaknya email sudah terdaftar pada sistem kami.");
              }
            });
        },
        showToasted(message, bg_color) {
          this.toast_message = message;
          this.is_show_toasted = true;
          this.toast_bg_color = bg_color ?? null;
          setTimeout(() => {
            this.is_show_toasted = false;
          }, 2500);
        }
      },
      data() {
        return {
          name: "Angga Hazza Sett",
          email: "kamujagoan@bwa.id",
          password: "",
          is_store_open: true,
          store_name: "",
          email_unavailable: false,
          is_show_toasted: false,
          toast_message: "",
          toast_bg_color: "",
        };
      },
    }).mount("#register");
  </script>
@endpush

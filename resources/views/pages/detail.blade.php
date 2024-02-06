@extends('layouts.app')

@section('title')
  Store Detail Page
@endsection

@section('content')
  <div class="page-content page-details">
    <!-- Breadcrumbs -->
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Product Details</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <!-- Gallery Photos -->
    <section class="store-gallery mb-3" id="gallery">
      <div class="container">
        <div class="row">
          <div class="col-lg-8" data-aos="zoom-in">
            <transition name="slide-fade" mode="out-in">
              <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-100 main-image" />
            </transition>
          </div>
          <div class="col-lg-2">
            <div class="row">
              <div class="col-3 col-lg-12 mt-lg-0 d-flex flex-column mt-2" v-for="(photo, index) in photos"
                :key="photo.id" data-aos="zoom-in" data-aos-delay="100">
                <a href="#" @click="changeActive(index)">
                  <img :src="photo.url" class="w-100 thumbnail-image" :class="{ active: index == activePhoto }" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Description -->
    <div class="store-details-container" data-aos="fade-up">
      <section class="store-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <h1>{{ $product->name }}</h1>
              <div class="owner">By {{ $product->user->store_name }}</div>
              <div class="price">${{ number_format($product->price) }}</div>
            </div>
            <div class="col-lg-2" data-aos="zoom-in">
              @auth
                <form action="{{ route('detail-add', $product->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <button type="submit" class="btn btn-success w-100 mb-3 px-4 text-white">
                    Add to Cart
                  </button>
                </form>
              @else
                <a href="{{ route('login') }}" class="btn btn-success w-100 mb-3 px-4 text-white">
                  Sign in to Add
                </a>
              @endauth
            </div>
          </div>
        </div>
      </section>

      <section class="store-description">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8">
              {!! $product->description !!}
            </div>
          </div>
        </div>
      </section>

      <section class="store-review">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8 mb-3 mt-3">
              <h5>Customer Review (3)</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-8">
              <ul class="list-unstyled">
                <!-- Customer 1 -->
                <li class="d-flex media">
                  <div class="flex-shrink-0">
                    <img src="/images/icons-testimonial-1.png" class="rounded-circle" />
                  </div>
                  <div class="flex-shrink-1 media-body ms-3">
                    <h5 class="mb-1 mt-2">Hazza Risky</h5>
                    I thought it was not good for living room. I really happy
                    to decided buy this product last week now feels like
                    homey.
                  </div>
                </li>
                <!-- Customer 2 -->
                <li class="d-flex media">
                  <div class="flex-shrink-0">
                    <img src="/images/icons-testimonial-2.png" class="rounded-circle" />
                  </div>
                  <div class="flex-shrink-1 media-body ms-3">
                    <h5 class="mb-1 mt-2">Anna Sukkirata</h5>
                    Color is great with the minimalist concept. Even I thought
                    it was made by Cactus industry. I do really satisfied with
                    this.
                  </div>
                </li>
                <!-- Customer 3 -->
                <li class="d-flex media">
                  <div class="flex-shrink-0">
                    <img src="/images/icons-testimonial-1.png" class="rounded-circle" />
                  </div>
                  <div class="flex-shrink-1 media-body ms-3">
                    <h5 class="mb-1 mt-2">Dakimu Wangi</h5>
                    When I saw at first, it was really awesome to have with.
                    Just let me know if there is another upcoming product like
                    this.
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection

@push('addon-script')
  <script src="/node_modules/vue/dist/vue.global.js"></script>
  <script type="module">
    Vue.createApp({
      mounted() {
        AOS.init();
      },
      methods: {
        changeActive(id) {
          this.activePhoto = id;
        },
      },
      data() {
        return {
          activePhoto: 0,
          photos: [
            @foreach ($product->galleries as $gallery)
              {
                id: {{ $gallery->id }},
                url: "{{ Storage::url($gallery->photos) }}",
              },
            @endforeach
          ],
        };
      },
    }).mount("#gallery");
  </script>
@endpush

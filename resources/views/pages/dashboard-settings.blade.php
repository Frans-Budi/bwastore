 @extends('layouts.dashboard')

 @section('title')
   Store Settings
 @endsection

 @section('content')
   <div class="section-content section-dashboard-home" data-aos="fade-up">
     <div class="container-fluid">
       <!-- Heading -->
       <div class="dashboard-heading">
         <h2 class="dashboard-title">Store Settings</h2>
         <p class="dashboard-subtitle">Make Store that profitable</p>
       </div>
       <!-- Content -->
       <div class="dashboard-content">
         <div class="row">
           <div class="col-12">
             <form action="{{ route('dashboard-settings-redirect', 'dashboard-settings-store') }}" method="POST"
               enctype="multipart/form-data">
               @csrf
               <div class="card">
                 <div class="card-body">
                   <!-- Form Input -->
                   <div class="row">
                     <!-- Nama Toko -->
                     <div class="col-md-6">
                       <div class="form-group mb-3">
                         <label for="" class="form-label">Nama Toko</label>
                         <input type="text" class="form-control" name="store_name" value="{{ $user->store_name }}" />
                       </div>
                     </div>
                     <!-- Kategori -->
                     <div class="col-md-6">
                       <div class="form-group mb-3">
                         <label for="" class="form-label">Kategori
                         </label>
                         <select name="category" class="form-select">
                           <option value="{{ $user->categories_id }}">Tidak diganti</option>
                           @foreach ($categories as $category)
                             <option value="{{ $category->id }}">{{ $category->name }}</option>
                           @endforeach
                         </select>
                       </div>
                     </div>
                     <!-- Open Store? -->
                     <div class="col-md-6">
                       <div class="form-group mb-3">
                         <label for="" class="form-label">Store</label>
                         <p class="text-muted">
                           Apakah anda juga ingin membuka toko?
                         </p>
                         <!-- Iya Boleh -->
                         <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="store_status" id="openStoreTrue"
                             value="1" {{ $user->store_status == 1 ? 'checked' : '' }} />
                           <label class="form-check-label" for="openStoreTrue">
                             Buka
                           </label>
                         </div>
                         <!-- Enggak, Makasih -->
                         <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="store_status" id="openStoreFalse"
                             value="0" {{ $user->store_status == 0 || $user->store_status == null ? 'checked' : '' }} />
                           <label class="form-check-label" for="openStoreFalse">
                             Sementara Tutup
                           </label>
                         </div>
                       </div>
                     </div>
                   </div>
                   <!-- Action Button -->
                   <div class="row">
                     <div class="col text-end">
                       <button type="submit" class="btn btn-success px-5">
                         Save Now
                       </button>
                     </div>
                   </div>
                 </div>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 @endsection

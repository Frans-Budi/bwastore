 @extends('layouts.admin')

 @section('title')
   Product Gallery
 @endsection

 @section('content')
   <div class="section-content section-dashboard-home" data-aos="fade-up">
     <div class="container-fluid">
       <!-- Heading -->
       <div class="dashboard-heading">
         <h2 class="dashboard-title">Product Gallery</h2>
         <p class="dashboard-subtitle">Create New Product Gallery</p>
       </div>
       <!-- Content -->
       <div class="dashboard-content">
         <div class="row">
           <div class="col-md-12">
             @if ($errors->any())
               <div class="alert alert-danger">
                 <ul>
                   @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                   @endforeach
                 </ul>
               </div>
             @endif
             <div class="card">
               <div class="card-body">
                 <form action="{{ route('product-gallery.store') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                   {{-- Form Input --}}
                   <div class="row">
                     {{-- Product --}}
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label class="form-label">Product</label>
                         <select name="products_id" class="form-control">
                           @foreach ($products as $product)
                             <option value="{{ $product->id }}">{{ $product->name }}</option>
                           @endforeach
                         </select>
                       </div>
                     </div>
                     {{-- Foto Product --}}
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label class="form-label">Foto Product</label>
                         <input type="file" name="photos" class="form-control" required>
                       </div>
                     </div>

                   </div>
                   {{-- Action Button --}}
                   <div class="row">
                     <div class="col text-end">
                       <button type="submit" class="btn btn-success px-5">
                         Save Now
                       </button>
                     </div>
                   </div>
                 </form>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 @endsection

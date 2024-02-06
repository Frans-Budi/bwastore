 @extends('layouts.dashboard')

 @section('title')
   Store Dashboard Product Detail
 @endsection

 @section('content')
   <div class="section-content section-dashboard-home" data-aos="fade-up">
     <div class="container-fluid">
       <!-- Heading -->
       <div class="dashboard-heading">
         <h2 class="dashboard-title">Shirup Marzan</h2>
         <p class="dashboard-subtitle">Product Details</p>
       </div>
       <!-- Content -->
       <div class="dashboard-content">
         <div class="row">
           <div class="col-12">
             @if ($errors->any())
               <div class="alert alert-danger">
                 <ul>
                   @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                   @endforeach
                 </ul>
               </div>
             @endif
             <form action="{{ route('dashboard-products-update', $product->id) }}" method="POST"
               enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
               <div class="card">
                 <div class="card-body">
                   <!-- Form Input -->
                   <div class="row">
                     <!-- Product Name -->
                     <div class="col-md-6">
                       <div class="form-group mb-3">
                         <label for="" class="form-label">Product Name
                         </label>
                         <input type="text" class="form-control" name="name" value="{{ $product->name }}" />
                       </div>
                     </div>
                     <!-- Price -->
                     <div class="col-md-6">
                       <div class="form-group mb-3">
                         <label for="" class="form-label">Price </label>
                         <input type="number" class="form-control" name="price" value="{{ $product->price }}" />
                       </div>
                     </div>
                     <!-- Kategori -->
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label for="" class="form-label">Kategori</label>
                         <select name="categories_id" class="form-select">
                           <option value="{{ $product->categories_id }}">Tidak diganti ({{ $product->category->name }})
                           </option>
                           @foreach ($categories as $category)
                             <option value="{{ $category->id }}">{{ $category->name }}</option>
                           @endforeach
                         </select>
                       </div>
                     </div>
                     <!-- Description -->
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label for="" class="form-label">Description
                         </label>
                         <textarea name="description" id="editor">{!! $product->description !!}</textarea>
                       </div>
                     </div>
                   </div>
                   <!-- Action Button -->
                   <div class="row">
                     <div class="col">
                       <button type="submit" class="btn btn-success btn-block w-100 px-5">
                         Update Product
                       </button>
                     </div>
                   </div>
                 </div>
               </div>
             </form>
           </div>
         </div>

         <div class="row mt-2">
           <div class="col-12">
             <div class="card">
               <div class="card-body">
                 <div class="row">
                   @foreach ($product->galleries as $gallery)
                     <div class="col-md-4">
                       <div class="gallery-container">
                         <img src="{{ Storage::url($gallery->photos ?? '') }}" class="w-100" />
                         <a href="{{ route('dashboard-products-gallery-delete', $gallery->id) }}" class="delete-gallery">
                           <img src="/images/icon-delete.svg" />
                         </a>
                       </div>
                     </div>
                   @endforeach
                   <div class="col-12">
                     <form action="{{ route('dashboard-products-gallery-upload') }}" method="POST"
                       enctype="multipart/form-data" name="photos">
                       @csrf
                       <input type="hidden" name="products_id" value="{{ $product->id }}">
                       <input type="file" id="file" class="d-none" name="photos" onchange="form.submit()" />
                       <button type="button" class="btn btn-secondary btn-block w-100 mt-3" onclick="thisFileUpload()">
                         Add Photo
                       </button>
                     </form>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 @endsection

 @push('addon-style')
   <style>
     .ck-editor__editable[role="textbox"] {
       /* Editing area */
       min-height: 180px;
       line-height: 1;
     }

     .ck-content .image {
       /* Block images */
       max-width: 80%;
       margin: 20px auto;
     }
   </style>
 @endpush

 @push('addon-script')
   <script>
     function thisFileUpload() {
       document.getElementById("file").click();
     }
   </script>
   <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
   <script>
     ClassicEditor.create(document.querySelector("#editor")).catch((error) => {
       console.error(error);
     });
   </script>
 @endpush

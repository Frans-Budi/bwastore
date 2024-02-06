 @extends('layouts.admin')

 @section('title')
   Product
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

 @section('content')
   <div class="section-content section-dashboard-home" data-aos="fade-up">
     <div class="container-fluid">
       <!-- Heading -->
       <div class="dashboard-heading">
         <h2 class="dashboard-title">Product</h2>
         <p class="dashboard-subtitle">Edit Product</p>
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
                 <form action="{{ route('product.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                   @method('PUT')
                   @csrf
                   {{-- Form Input --}}
                   <div class="row">
                     {{-- Nama Product --}}
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label class="form-label">Nama Product</label>
                         <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                       </div>
                     </div>
                     {{-- Pemilik Product --}}
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label class="form-label">Pemilik Product</label>
                         <select name="users_id" class="form-control">
                           <option value="{{ $item->users_id }}" selected>{{ $item->user->name }}</option>
                           @foreach ($users as $user)
                             <option value="{{ $user->id }}">{{ $user->name }}</option>
                           @endforeach
                         </select>
                       </div>
                     </div>
                     {{-- Kategori Product --}}
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label class="form-label">Kategori Product</label>
                         <select name="categories_id" class="form-control">
                           <option value="{{ $item->categories_id }}" selected>{{ $item->category->name }}</option>
                           @foreach ($categories as $category)
                             <option value="{{ $category->id }}">{{ $category->name }}</option>
                           @endforeach
                         </select>
                       </div>
                     </div>
                     {{-- Harga Product --}}
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label class="form-label">Harga Product</label>
                         <input type="number" name="price" class="form-control" value="{{ $item->price }}" required>
                       </div>
                     </div>
                     {{-- Deskripsi Product --}}
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label class="form-label">Deskripsi Product</label>
                         <textarea name="description" id="editor">{!! $item->description !!}</textarea>
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

 @push('addon-script')
   <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
   <script>
     ClassicEditor.create(document.querySelector('#editor'))
       .catch(error => {
         console.error(error);
       });
   </script>
 @endpush

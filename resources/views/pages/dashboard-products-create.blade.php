 @extends('layouts.dashboard')

 @section('title')
   Store Dashboard Product Create
 @endsection

 @section('content')
   <div class="section-content section-dashboard-home" data-aos="fade-up">
     <div class="container-fluid">
       <!-- Heading -->
       <div class="dashboard-heading">
         <h2 class="dashboard-title">Create Product</h2>
         <p class="dashboard-subtitle">Create your own product</p>
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
             <form action="{{ route('dashboard-products-store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="users_id" value="{{ Auth::user()->id }}" />
               <div class="card">
                 <div class="card-body">
                   <!-- Form Input -->
                   <div class="row">
                     <!-- Product Name -->
                     <div class="col-md-6">
                       <div class="form-group mb-3">
                         <label for="" class="form-label">Product Name</label>
                         <input type="text" class="form-control" name="name" />
                       </div>
                     </div>
                     <!-- Price -->
                     <div class="col-md-6">
                       <div class="form-group mb-3">
                         <label for="" class="form-label">Price</label>
                         <input type="number" class="form-control" name="price" />
                       </div>
                     </div>
                     <!-- Kategori -->
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label for="" class="form-label">Kategori</label>
                         <select name="categories_id" class="form-select">
                           @foreach ($categories as $category)
                             <option value="{{ $category->id }}">{{ $category->name }}</option>
                           @endforeach
                         </select>
                       </div>
                     </div>
                     <!-- Description -->
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label for="" class="form-label">Description</label>
                         <textarea name="description" id="editor"></textarea>
                       </div>
                     </div>
                     <!-- Thumbnail -->
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label for="" class="form-label">Thumbnail</label>
                         <input type="file" name="photo" class="form-control" id="formFileMultiple" multiple />
                         <p class="text-body-secondary">
                           Kamu dapat memilih lebih dari satu file
                         </p>
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
   <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
   <script>
     ClassicEditor.create(document.querySelector("#editor")).catch((error) => {
       console.error(error);
     });
   </script>
 @endpush

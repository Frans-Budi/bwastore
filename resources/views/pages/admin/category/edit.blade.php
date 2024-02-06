 @extends('layouts.admin')

 @section('title')
   Category
 @endsection

 @section('content')
   <div class="section-content section-dashboard-home" data-aos="fade-up">
     <div class="container-fluid">
       <!-- Heading -->
       <div class="dashboard-heading">
         <h2 class="dashboard-title">Category</h2>
         <p class="dashboard-subtitle">Edit Category</p>
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
                 <form action="{{ route('category.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                   {{-- Form Input --}}
                   <div class="row">
                     {{-- Nama Kategori --}}
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label class="form-label">Nama Kategori</label>
                         <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                       </div>
                     </div>
                     {{-- Foto --}}
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label class="form-label">Foto</label>
                         <input type="file" name="photo" class="form-control" required>
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

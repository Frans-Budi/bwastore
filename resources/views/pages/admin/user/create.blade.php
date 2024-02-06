 @extends('layouts.admin')

 @section('title')
   User
 @endsection

 @section('content')
   <div class="section-content section-dashboard-home" data-aos="fade-up">
     <div class="container-fluid">
       <!-- Heading -->
       <div class="dashboard-heading">
         <h2 class="dashboard-title">User</h2>
         <p class="dashboard-subtitle">Create New User</p>
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
                 <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                   {{-- Form Input --}}
                   <div class="row">
                     {{-- Nama User --}}
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label class="form-label">Nama User</label>
                         <input type="text" name="name" class="form-control" required>
                       </div>
                     </div>
                     {{-- Email User --}}
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label class="form-label">Email User</label>
                         <input type="email" name="email" class="form-control" required>
                       </div>
                     </div>
                     {{-- Password User --}}
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label class="form-label">Password User</label>
                         <input type="password" name="password" class="form-control" required>
                       </div>
                     </div>
                     {{-- Roles --}}
                     <div class="col-md-12">
                       <div class="form-group mb-3">
                         <label class="form-label">Roles</label>
                         <select name="roles" required class="form-control">
                           <option value="ADMIN">Admin</option>
                           <option value="USER">User</option>
                         </select>
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

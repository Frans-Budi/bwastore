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
         <p class="dashboard-subtitle">List of Users</p>
       </div>
       <!-- Content -->
       <div class="dashboard-content">
         <div class="row">
           <div class="col-md-12">
             <div class="card">
               <div class="card-body">
                 <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">
                   + Tambah User Baru
                 </a>
                 <div class="table-responsive">
                   <table class="table-hover scroll-horizontal-vertial w-100 table" id="crudTable">
                     <thead>
                       <tr>
                         <th>ID</th>
                         <th>Nama</th>
                         <th>Email</th>
                         <th>Roles</th>
                         <th>Aksi</th>
                       </tr>
                     </thead>
                     <tbody>

                     </tbody>
                   </table>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 @endsection

 @push('addon-script')
   {{-- <script>
    new DataTable('#crudTable');
   </script> --}}

   <script>
     var datatable = $('#crudTable').DataTable({
       processing: true,
       serverSide: true,
       ordering: true,
       ajax: {
         url: '{!! url()->current() !!}',
       },
       columns: [{
           data: 'id',
           nama: 'id'
         },
         {
           data: 'name',
           nama: 'name'
         },
         {
           data: 'email',
           nama: 'email'
         },
         {
           data: 'roles',
           nama: 'roles'
         },
         {
           data: 'action',
           nama: 'action',
           orderable: false,
           searchable: false,
           width: '15%'
         },
       ],
     })
   </script>
 @endpush

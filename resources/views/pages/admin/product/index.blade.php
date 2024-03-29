 @extends('layouts.admin')

 @section('title')
   Product
 @endsection

 @section('content')
   <div class="section-content section-dashboard-home" data-aos="fade-up">
     <div class="container-fluid">
       <!-- Heading -->
       <div class="dashboard-heading">
         <h2 class="dashboard-title">Product</h2>
         <p class="dashboard-subtitle">List of Products</p>
       </div>
       <!-- Content -->
       <div class="dashboard-content">
         <div class="row">
           <div class="col-md-12">
             <div class="card">
               <div class="card-body">
                 <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">
                   + Tambah Product Baru
                 </a>
                 <div class="table-responsive">
                   <table class="table-hover scroll-horizontal-vertial w-100 table" id="crudTable">
                     <thead>
                       <tr>
                         <th>ID</th>
                         <th>Nama</th>
                         <th>Pemilik</th>
                         <th>Kategori</th>
                         <th>Harga</th>
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
           data: 'user.name',
           nama: 'user.name'
         },
         {
           data: 'category.name',
           nama: 'category.name'
         },
         {
           data: 'price',
           nama: 'price'
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

 @extends('layouts.admin')

@section('title')
    Store Dashboard
@endsection

@section('content')
 <div class="section-content section-dashboard-home" data-aos="fade-up">
   <div class="container-fluid">
     <!-- Heading -->
     <div class="dashboard-heading">
       <h2 class="dashboard-title">Admin Dashboard</h2>
       <p class="dashboard-subtitle">This is BWAStore Administrator Panel</p>
     </div>
     <!-- Content -->
     <div class="dashboard-content">
       <!-- Cards -->
       <div class="row">
         <!-- Card 1 -->
         <div class="col-md-4">
           <div class="card mb-2">
             <div class="card-body">
               <div class="dashboard-card-title">Customer</div>
               <div class="dashboard-card-subtitle">{{ $customer }}</div>
             </div>
           </div>
         </div>
         <!-- Card 2 -->
         <div class="col-md-4">
           <div class="card mb-2">
             <div class="card-body">
               <div class="dashboard-card-title">Revenue</div>
               <div class="dashboard-card-subtitle">${{ $revenue }}</div>
             </div>
           </div>
         </div>
         <!-- Card 3 -->
         <div class="col-md-4">
           <div class="card mb-2">
             <div class="card-body">
               <div class="dashboard-card-title">Transaction</div>
               <div class="dashboard-card-subtitle">{{ $transaction }}</div>
             </div>
           </div>
         </div>
       </div>
       <!-- Recent Transaction -->
       {{-- <div class="row mt-3">
         <div class="col-12 mt-2">
           <h5 class="mb-3">Recent Transaction</h5>
           <!-- Card 1 -->
           <a href="/dashboard-transactions-details.html" class="card card-list d-block">
             <div class="card-body">
               <div class="row">
                 <div class="col-md-1">
                   <img src="/images/dashboard-icon-product-1.png" />
                 </div>
                 <div class="col-md-4">Shirup Harzzan</div>
                 <div class="col-md-3">Angga Rizky</div>
                 <div class="col-md-3">12 Januari, 2020</div>
                 <div class="col-md-1 d-none-d-md-block">
                   <img src="/images/dashboard-arrow-right.svg" />
                 </div>
               </div>
             </div>
           </a>
           <!-- Card 2 -->
           <a href="/dashboard-transactions-details.html" class="card card-list d-block">
             <div class="card-body">
               <div class="row">
                 <div class="col-md-1">
                   <img src="/images/dashboard-icon-product-2.png" />
                 </div>
                 <div class="col-md-4">LeBrone X</div>
                 <div class="col-md-3">Masayoshi</div>
                 <div class="col-md-3">11 January, 2020</div>
                 <div class="col-md-1 d-none-d-md-block">
                   <img src="/images/dashboard-arrow-right.svg" />
                 </div>
               </div>
             </div>
           </a>
           <!-- Card 3 -->
           <a href="/dashboard-transactions-details.html" class="card card-list d-block">
             <div class="card-body">
               <div class="row">
                 <div class="col-md-1">
                   <img src="/images/dashboard-icon-product-3.png" />
                 </div>
                 <div class="col-md-4">Soffa Lembutte</div>
                 <div class="col-md-3">Shayna</div>
                 <div class="col-md-3">11 January, 2020</div>
                 <div class="col-md-1 d-none-d-md-block">
                   <img src="/images/dashboard-arrow-right.svg" />
                 </div>
               </div>
             </div>
           </a>
         </div>
       </div> --}}
     </div>
   </div>
 </div>
@endsection

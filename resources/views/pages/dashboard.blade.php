 @extends('layouts.dashboard')

 @section('title')
   Store Dashboard
 @endsection

 @section('content')
   <div class="section-content section-dashboard-home" data-aos="fade-up">
     <div class="container-fluid">
       <!-- Heading -->
       <div class="dashboard-heading">
         <h2 class="dashboard-title">Dashboard</h2>
         <p class="dashboard-subtitle">Look what you have made today!</p>
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
                 <div class="dashboard-card-subtitle">{{ number_format($customer) }}</div>
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
                 <div class="dashboard-card-subtitle">{{ $transaction_count }}</div>
               </div>
             </div>
           </div>
         </div>
         <!-- Recent Transaction -->
         <div class="row mt-3">
           <div class="col-12 mt-2">
             <h5 class="mb-3">Recent Transaction</h5>
             @foreach ($transaction_data as $transaction)
               <a href="{{ route('dashboard-transaction-details', $transaction->id) }}" class="card card-list d-block">
                 <div class="card-body">
                   <div class="row">
                     <div class="col-md-1">
                       <img src="{{ Storage::url($transaction->product->galleries->first()->photos) ?? '' }}"
                         class="w-50" />
                     </div>
                     <div class="col-md-4">{{ $transaction->product->name ?? '' }}</div>
                     <div class="col-md-3">{{ $transaction->user->name ?? '' }}</div>
                     <div class="col-md-3">{{ $transaction_created_at ?? '' }}</div>
                       <div class="col-md-1 d-none-d-md-block">
                         <img src="/images/dashboard-arrow-right.svg" />
                       </div>
                     </div>
                   </div>
               </a>
             @endforeach
           </div>
         </div>
       </div>
     </div>
   </div>
 @endsection

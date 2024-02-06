 @extends('layouts.dashboard')

 @section('title')
   Store Dashboard Transactions
 @endsection

 @section('content')
   <div class="section-content section-dashboard-home" data-aos="fade-up">
     <div class="container-fluid">
       <!-- Heading -->
       <div class="dashboard-heading">
         <h2 class="dasboard-title">Transactions</h2>
         <p class="dashboard-subtitle">
           Big result start from the small one
         </p>
       </div>
       <!-- Content -->
       <div class="dashboard-content">
         <!-- Row 1 -->
         <div class="row mt-3">
           <div class="col-12 mt-2">
             <!-- Tabs Head -->
             <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
               <li class="nav-item" role="presentation">
                 <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                   type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                   Sell Product
                 </button>
               </li>
               <li class="nav-item" role="presentation">
                 <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                   type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                   Buy Product
                 </button>
               </li>
             </ul>
             <!-- Tabs Sell Product -->
             <div class="tab-content" id="pills-tabContent">
               <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                 tabindex="0">
                 <!-- Card 1 -->
                 @foreach ($sellTransactions as $transaction)
                   <a href="{{ route('dashboard-transaction-details', $transaction->id) }}"
                     class="card card-list d-block">
                     <div class="card-body">
                       <div class="row">
                         <div class="col-md-1">
                           <img src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                             class="w-50" />
                         </div>
                         <div class="col-md-4">{{ $transaction->product->name }}</div>
                         <div class="col-md-3">{{ $transaction->product->user->store_name }}</div>
                         <div class="col-md-3">{{ $transaction->created_at }}</div>
                         <div class="col-md-1 d-none d-md-block">
                           <img src="/images/dashboard-arrow-right.svg" />
                         </div>
                       </div>
                     </div>
                   </a>
                 @endforeach
                 <!-- End Card -->
               </div>
               <!-- Tab Buy Product -->
               <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                 tabindex="0">
                 <!-- Card 1 -->
                 @foreach ($buyTransactions as $transaction)
                   <a href="{{ route('dashboard-transaction-details', $transaction->id) }}"
                     class="card card-list d-block">
                     <div class="card-body">
                       <div class="row">
                         <div class="col-md-1">
                           <img src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                             class="w-50" />
                         </div>
                         <div class="col-md-4">{{ $transaction->product->name }}</div>
                         <div class="col-md-3">{{ $transaction->product->user->store_name }}</div>
                         <div class="col-md-3">{{ $transaction->created_at }}</div>
                         <div class="col-md-1 d-none d-md-block">
                           <img src="/images/dashboard-arrow-right.svg" />
                         </div>
                       </div>
                     </div>
                   </a>
                 @endforeach
                 <!-- End Card -->
               </div>
             </div>
             <!-- End Tabs -->
           </div>
         </div>
         <!-- End Row -->
       </div>
     </div>
   </div>
 @endsection

 @push('addon-script')
   <script src="/node_modules/vue/dist/vue.global.js"></script>
   <script type="module">
     var transactionDetails = Vue.createApp({
       mounted() {
         AOS.init();
       },
       data() {
         return {
           status: "SHIPPING",
           resi: "JNE20839149021029301231",
         };
       },
     }).mount("#transactionDetails");
   </script>
 @endpush

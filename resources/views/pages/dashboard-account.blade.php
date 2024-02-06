 @extends('layouts.dashboard')

 @section('title')
   Account Settings
 @endsection

 @section('content')
   <div class="section-content section-dashboard-home" data-aos="fade-up">
     <div class="container-fluid">
       <!-- Heading -->
       <div class="dashboard-heading">
         <h2 class="dashboard-title">My Account</h2>
         <p class="dashboard-subtitle">Update your current profile</p>
       </div>
       <!-- Content -->
       <div class="dashboard-content">
         <div class="row">
           <div class="col-12">
             <form action="{{ route('dashboard-settings-redirect', 'dashboard-settings-account') }}" method="POST"
               enctype="multipart/form-data" id="locations">
               @csrf
               <div class="card">
                 <div class="card-body">
                   <!-- Form Input -->
                   <div class="row">
                     <!-- Your Name -->
                     <div class="col-md-6 mb-3">
                       <div class="form-group">
                         <label for="name" class="form-label">Your Name</label>
                         <input type="text" class="form-control" id="name" name="name"
                           value="{{ $user->name }}" />
                       </div>
                     </div>
                     <!-- Your Email -->
                     <div class="col-md-6 mb-3">
                       <div class="form-group">
                         <label for="email" class="form-label">Your Email
                         </label>
                         <input type="email" class="form-control" id="email" name="email"
                           value="{{ $user->email }}" />
                       </div>
                     </div>
                     <!-- Address 1 -->
                     <div class="col-md-6 mb-3">
                       <div class="form-group">
                         <label for="addressOne" class="form-label">Address 1</label>
                         <input type="text" class="form-control" id="addressOne" name="addressOne"
                           value="{{ $user->address_one }}" />
                       </div>
                     </div>
                     <!-- Address 2 -->
                     <div class="col-md-6 mb-3">
                       <div class="form-group">
                         <label for="addressTwo" class="form-label">Address 2</label>
                         <input type="text" class="form-control" id="addressTwo" name="addressTwo"
                           value="{{ $user->address_two }}" />
                       </div>
                     </div>
                     <!-- Province -->
                     <div class="col-md-4 mb-3">
                       <div class="form-group">
                         <label for="provinces_id" class="form-label">Province</label>
                         <select name="provinces_id" id="provinces_id" class="form-select" v-if="provinces"
                           v-model="provinces_id">
                           <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                         </select>
                         <select v-else class="form-select"></select>
                       </div>
                     </div>
                     <!-- City -->
                     <div class="col-md-4 mb-3">
                       <div class="form-group">
                         <label for="regencies_id" class="form-label">City</label>
                         <select name="regencies_id" id="regencies_id" class="form-select" v-if="regencies"
                           v-model="regencies_id">
                           <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                         </select>
                         <select v-else class="form-select"></select>
                       </div>
                     </div>
                     <!-- Postal Code -->
                     <div class="col-md-4 mb-3">
                       <div class="form-group">
                         <label for="zip_code" class="form-label">Postal Code</label>
                         <input type="text" class="form-control" id="zip_code" name="zip_code"
                           value="{{ $user->zip_code }}" />
                       </div>
                     </div>
                     <!-- Country -->
                     <div class="col-md-6 mb-3">
                       <div class="form-group">
                         <label for="country" class="form-label">Country</label>
                         <input type="text" class="form-control" id="country" name="country" value="{{ $user->country }}" />
                       </div>
                     </div>
                     <!-- Mobile -->
                     <div class="col-md-6 mb-3">
                       <div class="form-group">
                         <label for="phone_number" class="form-label">Mobile</label>
                         <input type="text" class="form-control" id="phone_number" name="phone_number"
                           value="{{ $user->phone_number }}" />
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


 @push('addon-script')
   <script src="/node_modules/vue/dist/vue.global.js"></script>
   <script src="/node_modules/axios/dist/axios.min.js"></script>
   <script type="module">
     Vue.createApp({
       mounted() {
         AOS.init();
         this.getProvincesData();
       },
       methods: {
         getProvincesData() {
           var self = this;
           axios.get("{{ route('api-provinces') }}")
             .then(function(response) {
               self.provinces = response.data;
             });
         },
         getRegenciesData() {
           var self = this;
           axios.get("{{ url('api/regencies') }}/" + self.provinces_id)
             .then(function(response) {
               self.regencies = response.data;
             });
         },
       },
       watch: {
         provinces_id: function(val, oldVal) {
           this.regencies_id = null;
           this.getRegenciesData();
         }
       },
       data() {
         return {
           provinces: null,
           regencies: null,
           provinces_id: null,
           regencies_id: null,
         };
       },

     }).mount("#locations");
   </script>
 @endpush

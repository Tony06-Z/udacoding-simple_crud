@extends('layouts.auth')
@section('title', 'Perpustakaan | Login')
@section('content')



 <!-- Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
data-sidebar-position="fixed" data-header-position="fixed">
<div
class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
<div class="d-flex align-items-center justify-content-center w-100">
 <div class="row justify-content-center w-100">
   <div class="col-md-8 col-lg-6 col-xxl-4">
     <div class="card shadow-lg border-0 rounded-lg mb-0">
       <div class="card-body">
         <!-- Header Section -->
         <h3 class="text-center mb-4 text-primary">Selamat Datang di Perpustakaan</h3>
         <p class="text-center text-muted">Masuk untuk melanjutkan</p>

         <!-- Login Form -->
         <form method="POST" action="{{ route('login') }}">
           @csrf
           <!-- ID Library -->
           <div class="mb-3">
             <label for="id_library" class="form-label">ID Library</label>
             <input type="text" class="form-control @error('id_library') is-invalid @enderror" id="id_library"
                    name="id_library" placeholder="Masukkan ID Library Anda" value="{{ old('id_library') }}" required>
             @error('id_library')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
             @enderror
           </div>

           <!-- Password -->
           <div class="mb-4">
             <label for="password" class="form-label">Password</label>
             <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" placeholder="Masukkan Password Anda" required>
             @error('password')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
             @enderror
           </div>

           <!-- Remember Me -->
           <div class="d-flex align-items-center justify-content-between mb-4">
             <div class="form-check">
               <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
               <label class="form-check-label text-dark" for="flexCheckChecked">
                 Ingatkan di perangkat ini
               </label>
             </div>
           </div>

           <!-- Login Button -->
           <button type="submit" class="btn btn-primary w-100 py-2 fs-5 rounded-3">Login</button>

           <!-- Register Link -->
           <div class="text-center mt-4">
             <p class="text-muted">Belum memiliki akun?</p>
             <a class="text-primary fw-bold" href="{{ route('register') }}">Daftar Sekarang</a>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
</div>
</div>
</div>

<style>
    /* Background styling */
body {
  background: linear-gradient(to bottom, #f9f9f9, #eef2f3);
  margin: 0;
  height: 100vh;
}

/* Radial gradient for the background wrapper */
.radial-gradient {
  background: radial-gradient(circle at center, #ffffff, #e8f0f7);
}

/* Card container styling */
.card {
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  padding: 30px;
}

/* Form input field styling */
.form-control {
  border-radius: 6px;
  border: 1px solid #ced4da;
  font-size: 14px;
  padding: 10px;
}

.form-control:focus {
  border-color: #007bff;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

/* Login button styling */
.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
  transition: all 0.3s ease;
}

.btn-primary:hover {
  background-color: #0056b3;
  border-color: #0056b3;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Link styling */
a.text-primary {
  color: #007bff;
  text-decoration: none;
}

a.text-primary:hover {
  text-decoration: underline;
}

.text-muted {
  color: #6c757d;
}

</style>


@endsection

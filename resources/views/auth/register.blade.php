@extends('layouts.auth')
@section('title', 'Perpustakaan | Register')
@section('content')

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
  <div
    class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
      <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6 col-xxl-4">
          <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-body">
              <!-- Header Section -->
              <h3 class="text-center mb-4 text-primary">Perpustakaan</h3>
              <p class="text-center text-muted">Daftarkan diri Anda untuk melanjutkan</p>

              <!-- Registration Form -->
              <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- ID Library -->
                <div class="mb-3">
                  <label for="id_library" class="form-label">{{ __('ID Library') }}</label>
                  <input id="id_library" type="text" class="form-control @error('id_library') is-invalid @enderror" 
                         name="id_library" value="{{ old('id_library') }}" required autofocus
                         aria-describedby="idLibraryHelp" placeholder="Masukkan ID Library Anda">
                  @error('id_library')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <!-- Nama -->
                <div class="mb-3">
                  <label for="nama" class="form-label">{{__('Nama')}}</label>
                  <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" 
                         name="nama" value="{{ old('nama') }}" required autocomplete="nama"
                         placeholder="Masukkan Nama Anda">
                  @error('nama')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                  <label for="email" class="form-label">{{__('Email')}}</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                         name="email" value="{{ old('email') }}" required autocomplete="email"
                         placeholder="Masukkan Email Anda">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                  <label for="password" class="form-label">{{__('Password')}}</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" 
                         id="password" name="password" value="{{ old('password') }}" required
                         placeholder="Masukkan Password Anda">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <!-- ID Library Format Help -->
                <div id="idLibraryHelp" class="alert alert-info" style="display: none;">
                  <strong>Catatan:</strong> Anda dapat mengisi ID Library dengan format seperti: <strong>toni</strong>, <strong>toni123</strong>, atau lainnya.
                </div>

                <!-- Register Button -->
                <button type="submit" class="btn btn-primary w-100 py-2 fs-5 rounded-3">
                  {{ __('Register') }}
                </button>

                <!-- Login Link -->
                <div class="text-center mt-4">
                  <p class="text-muted">Sudah memiliki akun?</p>
                  <a class="text-primary fw-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                </div>
              </form>

              <!-- ID Library Help Script -->
              <script>
                document.getElementById('id_library').addEventListener('focus', function () {
                  document.getElementById('idLibraryHelp').style.display = 'block';
                });

                document.getElementById('id_library').addEventListener('blur', function () {
                  document.getElementById('idLibraryHelp').style.display = 'none';
                });
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
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

/* Button styling */
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

/* Alert styling */
.alert-info {
  font-size: 13px;
  margin-top: 10px;
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

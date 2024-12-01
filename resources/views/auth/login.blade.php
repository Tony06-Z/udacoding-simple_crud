@extends('layouts.auth')
@section('title', 'Perpustakaan | Login')
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('ID Library') }}</label>

                            <div class="col-md-6">
                            <input id="id_library" type="number" class="form-control @error('id_library') is-invalid @enderror" name="id_library" value="{{ old('id_library') }}" required autocomplete="id_library" autofocus>

                                @error('id_library')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


 <!--  Body Wrapper -->
 <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
 data-sidebar-position="fixed" data-header-position="fixed">
 <div
   class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
   <div class="d-flex align-items-center justify-content-center w-100">
     <div class="row justify-content-center w-100">
       <div class="col-md-8 col-lg-6 col-xxl-3">
         <div class="card mb-0">
           <div class="card-body">
             <p class="text-center">Perpustakaan</p>
             <form method="POST" action="{{ route('login') }}">
                @csrf
               <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">ID Library</label>
                 <input type="id_library" class="form-control @error('id_library') is-invalid @enderror" id="id_library" name="id_library" value="{{ old('id_library') }}">
                 @error('id_library')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                 @enderror
               </div>
               <div class="mb-4">
                 <label for="password" class="form-label">Password</label>
                 <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" required>
                 @error('password')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                 @enderror
               </div>
               <div class="d-flex align-items-center justify-content-between mb-4">
                 <div class="form-check">
                   <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                   <label class="form-check-label text-dark" for="flexCheckChecked">
                     Ingatkan di perangkat ini
                   </label>
                 </div>
                 {{-- <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a> --}}
               </div>
               <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Login</button>
               <div class="d-flex align-items-center justify-content-center">
                 <p class="">Belum memiliki akun?</p>
                 <a style="margin-bottom: 15px" class="text-primary fw-bold ms-2" href="{{ route('register') }}">Buatlah Sebuah akun
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>

@endsection

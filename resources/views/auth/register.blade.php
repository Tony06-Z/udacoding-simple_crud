@extends('layouts.auth')
@section('title', 'Perpustakaan | Register')
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="id_library" class="col-md-4 col-form-label text-md-end">{{ __('ID Library') }}</label>

                            <div class="col-md-6">
                                <input id="id_library" type="number" class="form-control @error('id_library') is-invalid @enderror" name="id_library" value="{{ old('id_library') }}" required autocomplete="id_library" autofocus">

                                @error('id_library')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
            <form method="POST" action="{{ route('register') }}">
                @csrf
              <div class="mb-3">
                <label for="id_library" class="form-label">{{ __('ID Library') }}</label>
                <input id="id_library" type="text" class="form-control @error('id_library') is-invalid @enderror" name="id_library" value="{{ old('id_library') }}" required  autofocus aria-describedby="idLibraryHelp" placeholder="ID Library">
                    @error('id_library')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">{{__('Nama')}}</label>
                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" aria-describedby="textHelp" placeholder="Nama">
                    @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            </div>
              <div class="mb-3">
                <label for="email" class="form-label">{{__('Email')}}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" aria-describedby="emailHelp" placeholder="Email">
                
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
              <div class="mb-4">
                <label for="password" class="form-label">{{__('Password')}}</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" required autocomplete="password" aria-describedby="textHelp" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>

               <!-- Custom Help Message for ID Library Format -->
                <div id="idLibraryHelp" class="alert alert-info" style="display: none;">
                    <strong>Catatan:</strong> Untuk ID Library Kamu Bisa mengisi dengan format seperti: <strong>toni-05</strong>
                </div>  

              <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">{{__('Register')}}</button>
              <div class="d-flex align-items-center justify-content-center">
                <p class="">Sudah mempunyai akun?</p>
                <a style="margin-bottom: 16px" class="text-primary fw-bold ms-2" href="{{ route('login') }}">{{__('Login')}}</a>
              </div>
            </form>

            <script>
                document.getElementById('id_library').addEventListener('focus', function() {
                    document.getElementById('idLibraryHelp').style.display = 'block';
                });
            
                document.getElementById('id_library').addEventListener('blur', function() {
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
@endsection

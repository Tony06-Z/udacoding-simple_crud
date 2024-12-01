@extends('layouts.admin')

@section('content')
<div class="container py-5" style="margin-top: 70px;"> <!-- Adjusted top margin to prevent overlapping -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0 fw-semibold">Tambah Data Pengunjung / Staff</h5> <!-- Example header title -->
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('user.store') }}" method="post">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-semibold">Nama</label>
                            <input
                                type="text"
                                class="form-control @error('nama') is-invalid @enderror"
                                id="nama"
                                name="nama"
                                placeholder="Nama"
                                value="{{ old('nama') }}"
                                required
                            />
                            @error('nama')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- ID Library -->
                        <div class="mb-3">
                            <label for="id_library" class="form-label fw-semibold">ID Library</label>
                            <input
                                type="text"
                                id="id_library"
                                name="id_library"
                                placeholder="ID Library"
                                class="form-select @error('id_library') is-invalid @enderror"
                                required
                            />
                            @error('id_library')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nomor Ponsel -->
                        <div class="mb-3">
                            <label for="no_hp" class="form-label fw-semibold">Nomor Ponsel</label>
                            <input
                                type="text"
                                class="form-control @error('no_hp') is-invalid @enderror"
                                id="no_hp"
                                name="no_hp"
                                placeholder="Nomor Ponsel"
                                value="{{ old('no_hp') }}"
                                required
                            />
                            @error('no_hp')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                placeholder="Email"
                                value="{{ old('email') }}"
                                required
                            />
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="alamat" class="form-label fw-semibold">Alamat</label>
                            <input
                                type="text"
                                name="alamat"
                                id="alamat"
                                class="form-control @error('alamat') is-invalid @enderror"
                                placeholder="Alamat"
                                value="{{ old('alamat') }}"
                                required
                            />
                            @error('alamat')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                name="password"
                                placeholder="Password"
                                required
                            />
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Role -->
                        <div class="mb-3">
                            <label for="role" class="form-label fw-semibold">Role</label>
                            <select
                                id="role"
                                name="role"
                                class="form-select @error('role') is-invalid @enderror"
                                required
                            >
                            <option value="pengunjung">Pengunjung</option>
                            <option value="admin">Admin</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('user.index') }}" class="btn btn-secondary me-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

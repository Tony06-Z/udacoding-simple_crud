@extends('layouts.admin')

@section('content')
<div class="container py-5" style="margin-top: 70px;"> <!-- Adjusted top margin to prevent overlapping -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 fw-semibold">Edit Pengunjung / Staff</h5> <!-- Example header title -->
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('user.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-semibold">Nama</label>
                            <input
                                type="text"
                                class="form-control @error('nama') is-invalid @enderror"
                                id="nama"
                                name="nama"
                                placeholder="Nama"
                                value="{{ $user->nama ?? old('nama') }}"
                                required
                            />
                            @error('nisn')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- ID Library -->
                        <div class="mb-3">
                            <label for="id_library" class="form-label">ID Library</label>
                            <input
                                type="number"
                                class="form-control"
                                id="id_library" name="id_library"
                                value="{{ $user->id_library ?? old('id_library') }}"
                            />
                            <small class="text-muted">Abaikan jika tidak ingin mengubah Id Library.</small>
                        </div>


                        <!-- Nomor Ponsel -->
                        <div class="mb-3">
                            <label for="no_hp" class="form-label fw-semibold">Nomor Ponsel</label>
                            <input
                                type="text"
                                class="form-control @error('no_hp') is-invalid @enderror"
                                id="no_hp"
                                name="no_hp"
                                value="{{ $user->no_hp ?? old('no_hp') }}"
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
                            value="{{ $user->email ?? old('email') }}"
                            required
                        />
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror

                <!-- Alamat -->
                    <div class="mb-3">
                            <label for="alamat" class="form-label fw-semibold">Alamat</label>
                            <input
                                type="text"
                                name="alamat"
                                id="alamat"
                                class="form-control @error('alamat') is-invalid @enderror"
                                placeholder="Alamat"
                                value="{{ $user->alamat ?? old('alamat') }}"
                                required
                            />
                            @error('alamat')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    

                     <div class="mb-3">
                        <label for="edit_password" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="edit_password" name="password">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
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
                         <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

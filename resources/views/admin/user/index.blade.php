@extends('layouts.admin')
@section('title', 'Admin | Data Pengunjung / Staff')

@section('content')
<div class="container mt-5">
  <div class="row">
      <div class="card">
          <div class="card-body">
              <!-- Display Success Message -->
              @if(session('success'))
              <div class="alert alert-success" role="alert">
                  {{ session('success') }}
              </div>
              @endif

              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title fw-semibold mb-0">Data Pengunjung / Staff</h5>
                <!-- Tambahkan Data Button -->
                <a href="{{ route('user.create') }}" class="btn btn-success btn-sm">
                    Tambahkan Data
                </a>
            </div>


              <!-- Table Wrapper for Responsiveness -->
              <div class="table-responsive">
                  <table class="table table-striped table-hover align-middle">
                      <thead class="table-dark">
                          <tr>
                              <th>Id</th>
                              <th>Nama</th>
                              <th>Id Library</th>
                              <th>Nomor Hp</th>
                              <th>Email</th>
                              <th>Role / Level</th>
                              <th>Alamat</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $user)
                          <tr>
                              <td>{{ $user->id }}</td>
                              <td>{{ $user->nama }}</td>
                              <td>{{ $user->id_library }}</td>
                              <td>
                                  <span>{{ $user->no_hp }}</span>
                              </td>
                              <td style="word-break: break-word;">{{ $user->email }}</td>
                              <td>
                                  @if($user->role === 'admin')
                                  <span class="badge bg-danger text-white">{{ $user->role }}</span>
                                  @else
                                  <span class="badge bg-dark text-white">{{ $user->role }}</span>
                                  @endif
                              </td>
                              <td style="word-break: break-word;">{{ $user->alamat }}</td>
                              <td>
                                  <div class="d-flex gap-2">
                                      <a href="{{ route('user.edit', $user->id) }}" class="btn btn-secondary btn-sm">Merubah</a>
                                      <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-primary btn-sm">Menghapus</button>
                                      </form>
                                  </div>
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection
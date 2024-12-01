@extends('layouts.pengunjung')

@section('content')
{{-- <div class="container py-5">
    <!-- Welcome Message -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">Selamat, {{ Auth::user()->nama }}!</h1>
        <p class="text-muted">
            Ini adalah page Profile .
        </p>
    </div>

    <!-- Profile Section -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom-0">
                    <h4 class="fw-semibold text-center">Profile Kamu</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Name:</strong> {{ Auth::user()->nama }}
                        </li>
                        <li class="list-group-item">
                            <strong>Email:</strong> {{ Auth::user()->email }}
                        </li>
                        <li class="list-group-item">
                            <strong>Role:</strong> {{ ucfirst(Auth::user()->role) }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class="image d-flex flex-column justify-content-center align-items-center">

            <!-- Profile Picture -->
            <button class="btn btn-secondary">
                <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" />
            </button>

            <!-- Name and ID Library -->
            <span class="name mt-3">{{ Auth::user()->nama }}</span>
            <span class="idd">{{ Auth::user()->id_library }}</span>

            <!-- Email and Icon -->
            <div style="margin-top: 10px" class="d-flex flex-row justify-content-center align-items-center gap-2">
                <span class="idd1">{{ Auth::user()->email }}</span>
                <span><i class="fa fa-envelope"></i></span>
            </div>

            <!-- Conditional Message Display -->
            @if(session('success'))
                <!-- Success Message if form is updated -->
                {{-- <div class="text-center mt-3">
                    <h5>Profile Updated Successfully!</h5>
                    <p><strong>Nomor Ponsel:</strong> {{ Auth::user()->no_hp }}</p>
                    <p><strong>Alamat:</strong> {{ Auth::user()->alamat }}</p>
                </div> --}}
            @endif
            
                <!-- If no phone number or address is set, show the form -->
                <div id="message-container" style="color: red; font-size: 14px; text-align: center; margin-top: 10px;"></div>

                @if(empty(Auth::user()->no_hp) || empty(Auth::user()->alamat))
                    <form action="{{ route('pengunjung.update', Auth::user()->id) }}" method="POST" style="width: 100%;">
                        @csrf
                        @method('PUT')
                        <div class="d-flex gap-3 justify-content-center mt-3">
                            <!-- Phone Input -->
                            <input id="phone" name="no_hp" value="{{ Auth::user()->no_hp }}" required type="text" class="form-control" placeholder="Nomor ponsel" style="max-width: 200px;" />

                            <!-- Address Input -->
                            <input id="address" name="alamat" value="{{ Auth::user()->alamat }}" required type="text" class="form-control" placeholder="Alamat" style="max-width: 200px;" />
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-dark">Update Profile</button>
                        </div>
                    </form>
                @else
                    <!-- Show the phone number and address if they are already set -->
                    <div class="">
                        <p style="margin-bottom: 1px; margin-top: -10px"><strong>Nomor Ponsel:</strong> {{ Auth::user()->no_hp }}</p>
                        <p><strong>Alamat:</strong> {{ Auth::user()->alamat }}</p>
                    </div>
                @endif

            <!-- Additional Profile Info -->
            <div class="text mt-3">
                <span>Ini Adalah Page Profile anda {{ Auth::user()->id_library }}</span>
            </div>
            <span class="join">Login Pada: {{ Auth::user()->created_at->timezone('Asia/Jakarta')->locale('id')->translatedFormat('d F Y, H:i') }}
            </span>
            <div style="margin-top: 10px; size: 10px">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-primary ">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    </div>
</div>



<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get elements
    const phoneInput = document.getElementById("phone");
    const addressInput = document.getElementById("address");
    const messageContainer = document.getElementById("message-container");

    // Add event listeners for changes in input
    phoneInput.addEventListener('input', checkInputs);
    addressInput.addEventListener('input', checkInputs);

    // Function to check inputs and update message
    function checkInputs() {
        const phone = phoneInput.value.trim();
        const address = addressInput.value.trim();

        // Hide message initially before checking
        messageContainer.style.opacity = 0;

        // Show the message after a 5-second delay
        setTimeout(() => {
            if (!phone && !address) {
                messageContainer.textContent = "Kamu belum memasukkan nomor ponsel dan alamat.";
            } else if (!phone) {
                messageContainer.textContent = "Kamu belum memasukkan nomor ponsel.";
            } else if (!address) {
                messageContainer.textContent = "Kamu belum memasukkan alamat.";
            } else {
                messageContainer.textContent = ""; // Clear message if both are filled
            }
            
            // Show message with fade-in effect
            messageContainer.style.opacity = 1;
        }, 500); // 5 seconds delay
    }

    // Initial check on page load
    checkInputs();
});
</script>
@endsection

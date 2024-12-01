    @extends('layouts.admin')
    @section('title', 'Admin | Dashboard')
    @section('content')
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div style="font-size: 19px" class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div style="font-size: 18px" id="welcomeMessage">
                                {{(__('Selamat Datang Admin'))}}
                            </div>
                            <div>
                                <span style="font-size: 15.5px;" class="fw-semibold">{{ Auth::user()->nama }}</span>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Change the message after 5 seconds   
            setTimeout(() => {
                const messageDiv = document.getElementById("welcomeMessage");
                if (messageDiv) {
                    // Replace the content with the hourly greeting
                    messageDiv.textContent = "{{ getHourlyGreeting() }}";
                }
            }, 2500); // 5000 milliseconds = 5 seconds
        });
    </script>
    @endsection

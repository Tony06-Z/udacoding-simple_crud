<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    public function login(Request $request) {
            // Validate the request
        $request->validate([
            'id_library' => 'required|string',
            'password' => ['required', 'min:8'],
        ], [
            'id_library.required' => "ID Library harus diisi.",
            'password.required' => "Password harus diisi.",
            'password.min' => 'Password setidaknya harus berisi 8 karakter.',
        ]);

        // Check if the ID Library exists
        $user = User::where('id_library', $request->id_library)->first();
        if (!$user) {
            return back()->withErrors([
                'id_library' => 'ID Library yang dimasukkan tidak ditemukan.',
            ])->withInput($request->except('password'));
        }

        // Attempt to authenticate
        if (!Auth::attempt(['id_library' => $request->id_library, 'password' => $request->password])) {
            return back()->withErrors([
                'password' => 'Password yang kamu masukkan salah. Silakan coba lagi.',
            ])->withInput($request->except('password'));
        }

        // If successful, regenerate session and redirect
        $request->session()->regenerate();

        return redirect()->intended($this->redirectTo());
    }


    protected function redirectTo()
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            if ($user->role === 'admin') {
                return route('admin.dashboard');
            } elseif ($user->role === 'pengunjung') {
                return route('pengunjung.dashboard');
            }
        }
        
    }

    protected function authenticated(Request $request, $user)
    {
       
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}

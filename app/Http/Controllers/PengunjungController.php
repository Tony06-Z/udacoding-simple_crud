<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function index() {

        if (!session()->has('visited')) {
            session()->flash('show_welcome', true);
            session()->put('visited', true);
        } else {
            session()->forget('show_welcome');
        }

        return view('pengunjung.dashboard');
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate the input
            $request->validate([
                'no_hp' => 'required|string',
                'alamat' => 'required|string|max:255',
            ]);

            // Find the user by ID
            $user = User::findOrFail($id);

            // Update the user's details
            $user->no_hp = $request->no_hp;
            $user->alamat = $request->alamat;

            // Save the changes
            $user->save();

            // Return a success message (optional)
            return redirect()->route('pengunjung.dashboard')
                             ->with('success', 'User data updated successfully');
        } catch (ValidationException $e) {
            // If validation fails, return with error messages
            return back()->withErrors($e->errors())->withInput();
        }
    }
}

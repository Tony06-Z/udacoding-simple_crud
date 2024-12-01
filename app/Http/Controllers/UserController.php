<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'id_library' => ['required', 'string', 'unique:users'],
            'no_hp' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'alamat' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'in:admin,pengunjung'],
        ]); 
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
       
        User::create([
            'nama' => $request->nama,
            'id_library' => $request->id_library,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'id_library' => ['nullable', 'string', 'unique:users,id_library,' . $id],
                'no_hp' => ['required', 'string', 'unique:users,no_hp,' . $id],
                'email' => 'required|email|max:255|unique:users,email,' . $id,
                'alamat' => ['required', 'string', 'max:255'],
                'password' => ['nullable', 'string', 'min:8'],
                'role' => ['required', 'in:admin,pengunjung'],
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }

        $user = User::findOrFail($id);

        $user->nama = $request->nama;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->role = $request->role;

        if ($request->id_library) {
            $user->id_library = $request->id_library;
        }

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}

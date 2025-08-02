<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //create(store User)
    public function store(Request $request)
    {
        // Validate input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'required|boolean', // true for admin, false for regular user
        ]);
    
        // Create a new user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'is_admin' => $validated['is_admin'],
        ]);
    
        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    public function index()
    {
        // Fetch all users
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }

    public function profile()
    {
        return view('profile');
    }

    public function editProfile()
    {
        return view('profile.edit', ['user' => auth()->user()]);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
        ]);

        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}

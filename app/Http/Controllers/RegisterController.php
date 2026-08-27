<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', Rule::in(['student', 'instructor'])],
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],
            'agree_terms' => ['accepted'],
        ], [
            'first_name.required' => 'Please enter your first name.',
            'first_name.max' => 'First name is too long.',

            'last_name.required' => 'Please enter your last name.',
            'last_name.max' => 'Last name is too long.',

            'email.required' => 'Please enter your email.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered. Please login.',

            'password.required' => 'Please enter a password.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password and confirm password do not match.',

            'role.in' => 'Invalid role selected.',

            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Only JPG, PNG and WEBP images are allowed.',
            'image.max' => 'Image size must be less than 2MB.',

            'agree_terms.accepted' => 'You must agree to the Terms of Service and Privacy Policy.',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');
        }

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'image' => $imagePath,
            'role' => $validated['role'],
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Account created successfully! 🎉');
    }
}
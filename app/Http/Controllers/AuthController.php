<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Start PHP session if not started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Basic validation
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Find user
        $user = User::where('email', $request->email)->first();

        // Verify credentials
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'Invalid email or password.',
            ])->onlyInput('email');
        }

        // Create manual session
        $_SESSION['user_id'] = $user->id;
        $_SESSION['role']    = $user->role;
        $_SESSION['email']   = $user->email;
        return redirect('/');
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();

        return redirect()->route('login');
    }

    public function index()
    {
        // Start session if needed
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Not logged in
        if (!isset($_SESSION['user_id'])) {
            return redirect()->route('login');
        }

        $user = User::find($_SESSION['user_id']);
        if (!$user) {
            return redirect()->route('logout');
        }

        switch ((int) $_SESSION['role']) {
            case '0':
                return view('admin.dashboard', ['user' => $user]);

            case '1':
                return view('manager.dashboard', ['user' => $user]);

            case '2':
                return view('user.dashboard', ['user' => $user]);

            default:
                return redirect()->route('logout');
        }
    }
}

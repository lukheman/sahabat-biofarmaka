<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Log out the user
        auth()->logout();

        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'Anda telah berhasil keluar.');
    }
}

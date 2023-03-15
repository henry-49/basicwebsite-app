<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


    /**
     * Admin profile
     */
    public function profile()
    {
        $id = Auth::user()->id;

        $adminData = User::find($id);

       return view('admin.admin_profile_view', compact('adminData'));
    }

    /**
     * Edit Profile
     */

     public function EditProfile()
     {

        $id = Auth::user()->id;

        $editData = User::find($id);

        return view('admin.admin_profile_edit', compact('editData'));
     }
}

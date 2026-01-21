<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * List all managers
     */
    public function showManagers()
    {
        $managers = User::where('role', '1')->get();

        return view('admin.managers', compact('managers'));
    }

    /**
     * Show create manager form
     */
    public function createManagerForm()
    {
        return view('admin.createmanager');
    }

    /**
     * Store manager
     */
    public function createManager(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'mobile'     => $request->has('mobile') ? $request->mobile : null,
            'role'       => '1', // Manager

            'password'   => Hash::make($request->password),
        ]);

        return redirect()->route('managers.list')
            ->with('success', 'Manager created successfully.');
    }

    /**
     * Show edit manager form
     */
    public function editManagerForm($id)
    {
        $manager = User::where('role', '1')->findOrFail($id);

        return view('admin.editmanager', compact('manager'));
    }

    /**
     * Update manager
     */
    public function editManager(Request $request, $id)
    {
        $manager = User::where('role', '1')->findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|unique:users,email,' . $manager->id,
        ]);

        $manager->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'mobile'     => $request->has('mobile') ? $request->mobile : null,
        ]);

        return redirect()->route('managers.list')
            ->with('success', 'Manager updated successfully.');
    }

    /**
     * Delete manager
     */
    public function deleteManager($id)
    {
        $manager = User::where('role', '1')->findOrFail($id);
        $manager->delete();

        return redirect()->route('managers.list')
            ->with('success', 'Manager deleted successfully.');
    }
}

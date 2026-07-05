<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Users;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = User::with('company')->Admins()->latest()->paginate(10);

        return view('superadmin.admin.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();

        return view('superadmin.admin.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest  $request, Company $company)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'Admin';

        User::create($data);

        return redirect()->route('superadmin.admin.index')
            ->with('success', 'Admin created successfully!');
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
    public function edit(string $id, Company $company)
    {
        $admin = User::with('company')->findOrFail($id);
        $companies = Company::all();
        return view('superadmin.admin.edit', compact('admin', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, User $admin)
    {
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $data['role'] = 'Admin';

        $admin->update($data);

        return redirect()->route('superadmin.admin.index')
            ->with('success', 'Admin updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        $admin->delete();

        return redirect()->route('superadmin.admin.index')
            ->with('success', 'Admin deleted successfully!');
    }
}

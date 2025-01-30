<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        return response()->json(Admin::all(), 200);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|unique:admins',
                'email' => 'required|email|unique:admins',
                'phone' => 'nullable|string',
                'status' => 'required|in:active,inactive',
                'password' => 'required|string|min:8',
            ]);

            $data = $request->all();
            $data['password'] = Hash::make($request->password);

            Admin::create($data);

            return redirect()->route('home')->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return response()->json($admin, 200);
    }


    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);


        $request->validate([
            'username' => 'sometimes|required|unique:admins,username,' . $id,
            'email' => 'sometimes|required|email|unique:admins,email,' . $id,
            'phone' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'password' => 'nullable|string|min:8',
        ]);


        if ($request->has('password')) {
            $request['password'] = Hash::make($request->password);
        }


        $admin->update($request->all());


        return redirect()->route('home')->with('success', 'Data berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin tidak ditemukan'], 404);
        }

        $admin->delete();
        return response()->json(['message' => 'Admin berhasil dihapus']);
    }


    public function edit($id)
    {

        $admin = Admin::findOrFail($id);


        return view('edit', compact('admin'));
    }
}

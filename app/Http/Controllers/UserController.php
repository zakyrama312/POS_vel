<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.petugas.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.petugas.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $request -> validated();
        User::create([
            'name'     => $request->namapetugas,
            'username'     => $request->username,
            'email' => 'rpl@gmail.com',
            'password'   => bcrypt($request->password),
            'kelas' => $request->kelas,
            'role' => $request->role,
            'id_cabang' => Auth::user()->id_cabang,
            'created_at' => now()

        ]);

        // return view('/barang')->with('msg', 'Berhasil Ditambahkan');
        return redirect('user')->with('msg', 'Berhasil Ditambahkan');
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
        $user = User::find($id);

        return view('admin.petugas.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $data = User::find($id);

        $data->name = $request->namapetugas;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->role = $request->role;
        $data->kelas = $request->kelas;
        $data->updated_at = now();
        $data->save();

        return redirect('user')->with('msg', 'Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

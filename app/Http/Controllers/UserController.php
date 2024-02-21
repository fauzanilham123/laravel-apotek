<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $users = user::query();
                if(request('cari')) {
                    $users->where(function($query) {
                    foreach($query->getModel()->getFillable() as $column) {
                        $query->orWhere($column, 'LIKE', "%".request('cari')."%");
                    }
                    });
                    // Filter hanya yang flag 1
                    $users->where('flag', 1);
                } else {
                    // Default hanya tampilkan flag 1
                    $users->where('flag', 1);
                }

        $users = $users->sortable()->paginate(10);

        //render view with users
        return view('admin.user.index', compact('users'));
    }
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'role' => 'required',
            'name' =>'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);

        User::create([
        'role' => $request->role,
        'name' => $request->name,
        'telepon' => $request->telepon,
        'alamat' => $request->alamat,
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'flag' => 1,
    ]);
    activity()->causedBy(Auth::user())->log('Menambahkan user ' . $request->name . ' dengan role ' . $request->role);
    return redirect()->route('user.index')-> with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id)
    {
        //
        $users = user::find($id);
        return view('admin.user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'role' => 'required',
            'name' =>'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'username' => 'required|unique:users,username,'. $id,
            'password',
        ]);
            $users = user::findOrFail($id);

            $users->update([
        'role' => $request->role,
        'name' => $request->name,
        'telepon' => $request->telepon,
        'alamat' => $request->alamat,
        'username' => $request->username,
        'password' => Hash::make($request->password),
    ]);
    activity()->causedBy(Auth::user())->log('Mengedit user pada id ' . $id );
        return redirect()->route('user.index')-> with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cek apakah user yang akan dihapus adalah user yang sedang login
        if ($id == Auth::user()->id) {
            return redirect()->route('user.index')->with(['error' => 'Anda tidak dapat menghapus akun Anda sendiri.']);
        }
        $user = user::findOrFail($id);  
        // Mengubah nilai flag menjadi 0
        $user->update(['flag' => 0]);
        activity()->causedBy(Auth::user())->log('Menghapus user pada id ' . $id );
        return redirect()->route('user.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
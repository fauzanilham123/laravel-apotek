<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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
        //
        //get posts
        $users = user::sortable()->paginate(5);

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
    ]);
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
        return redirect()->route('user.index')-> with(['success' => 'Data Berhasil Disimpan!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = user::findOrFail($id);
        // Periksa apakah user yang akan dihapus adalah admin
            if ($user->role === 'admin') {
        // Periksa jumlah admin yang tersisa
        $remainingAdmins = User::where('role', 'admin')->count();

        // Jika hanya satu admin tersisa, beri pesan error
            if ($remainingAdmins <= 1) {
            return redirect()->route('user.index')->with(['error' => 'Tidak dapat menghapus satu-satunya admin yang tersisa.']);
        }
    }
    
        // Mengubah nilai flag menjadi 0
        $user->delete();
    
        return redirect()->route('user.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
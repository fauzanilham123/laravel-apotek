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
        $users = User::query();

        if(request('cari')) {
            foreach($users->getModel()->getFillable() as $column) {
                $users->orWhere($column, 'LIKE',  "%".request('cari')."%");
            }
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
        activity()->causedBy(Auth::user())->log('Menghapus user pada id ' . $id );
        return redirect()->route('user.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
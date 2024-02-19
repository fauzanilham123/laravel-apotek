<?php

namespace App\Http\Controllers;

use App\Models\Drugs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrugsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drugs = Drugs::query();
        if(request('cari')) {
            $drugs->where(function($query) {
            foreach($query->getModel()->getFillable() as $column) {
                $query->orWhere($column, 'LIKE', "%".request('cari')."%");
            }
            });
            // Filter hanya yang flag 1
            $drugs->where('flag', 1);
        } else {
            // Default hanya tampilkan flag 1
            $drugs->where('flag', 1);
        }
        $drugs = $drugs->sortable()
                        ->where('flag',1)
                        ->paginate(10);

        //render view with drugs
        return view('admin.obat.index', compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'kode_obat' => 'required|unique:drugs',
            'name' =>'required',
            'expired_date' => 'required|date',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);

        drugs::create([
        'kode_obat' => $request->kode_obat,
        'nama_obat' => $request->name,
        'expired_date' => $request->expired_date,
        'jumlah' => $request->jumlah,
        'harga' => $request->harga,
        'flag' => 1,
    ]);
    activity()->causedBy(Auth::user())->log('Menambahkan obat ' . $request->name . ' dengan kode ' . $request->kode_obat);

    return redirect()->route('obat.index')-> with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Drugs $drugs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $drugs = Drugs::find($id);
        return view('admin.obat.edit', compact('drugs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'kode' => 'required|unique:drugs,kode_obat,' . $id,
            'name' =>'required',
            'expired_date' => 'required|date',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);
                $drugs = drugs::findOrFail($id);

         //update post without image
            $drugs->update([
                'kode_obat' => $request->kode,
                'nama_obat' => $request->name,
                'expired_date' => $request->expired_date,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga,
            ]);
        activity()->causedBy(Auth::user())->log('Mengedit obat pada id ' . $id);
        return redirect()->route('obat.index')-> with(['success' => 'Data Berhasil Disimpan!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $drugs = drugs::findOrFail($id);
    
        // Mengubah nilai flag menjadi 0
        $drugs->update(['flag' => 0]);
        activity()->causedBy(Auth::user())->log('Menghapus obat pada id ' . $id);
        return redirect()->route('obat.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
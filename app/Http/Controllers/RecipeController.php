<?php

namespace App\Http\Controllers;

use App\Models\recipe;
use App\Models\Drugs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = recipe::sortable()->where('flag', 1)->paginate(10);
        $drugs = drugs::get()->where('flag', 1);

        //render view with recipes
        return view('apotek.index', compact('recipes', 'drugs'));
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
            'no' => 'required|unique:recipes',
            'date' =>'required|date',
            'nama_dokter' => 'required',
            'nama_obat' => 'required',
            'nama_pasien' => 'required',
            'jumlah_obat' => 'required',
        ]);

        recipe::create([
        'no' => $request->no,
        'date' => $request->date,
        'nama_dokter' => $request->nama_dokter,
        'id_obat' => $request->nama_obat,
        'nama_pasien' => $request->nama_pasien,
        'jumlah_obat' => $request->jumlah_obat,
        'flag' => 1,
    ]);
    return redirect()->route('resep.index')-> with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $recipes = recipe::find($id);
        $drugs = drugs::get()->where('flag', 1);
        $selectedDrugId = $recipes->id_obat;


        return view('apotek.edit', compact('recipes','drugs','selectedDrugId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'no' => 'required|unique:recipes,no,' . $id,
            'date' =>'required',
            'nama_dokter' => 'required',
            'id_obat' => 'required',
            'nama_pasien' => 'required',
            'jumlah_obat' => 'required',
        ]);
                $recipes = recipe::findOrFail($id);

         //update post without image
            $recipes->update([
                'no' => $request->no,
                'date' => $request->date,
                'nama_dokter' => $request->nama_dokter,
                'id_obat' => $request->id_obat,
                'nama_pasien' => $request->nama_pasien,
                'jumlah_obat' => $request->jumlah_obat,
            ]);
        return redirect()->route('resep.index')-> with(['success' => 'Data Berhasil Disimpan!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $recipes = recipe::findOrFail($id);
    
        // Mengubah nilai flag menjadi 0
        $recipes->update(['flag' => 0]);
    
        return redirect()->route('resep.index')->with(['success' => 'Data berhasil dihapus']);
    }

        public function getRecipeById($id)
    {
        $recipe = recipe::find($id);

        return response()->json($recipe);
    }
}
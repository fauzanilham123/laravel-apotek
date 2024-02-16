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
        $recipes = recipe::sortable()->where('flag', 1)->where('transaksi', 0)->paginate(10);
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
            'jumlah_obat' => 'required|numeric|min:1', // Menggunakan numeric dan min:1 untuk memastikan jumlah_obat positif
        ]);

            // Mengambil jumlah obat yang tersedia dari tabel obat
        $drug = Drugs::find($request->nama_obat);
        $jumlah_obat_tersedia = $drug->jumlah;

        // Memeriksa apakah jumlah_obat yang diminta melebihi jumlah obat yang tersedia
        if ($request->jumlah_obat > $jumlah_obat_tersedia) {
            return redirect()->route('resep.index')->with(['error' => 'Jumlah obat melebihi stok yang tersedia.'])->withInput($request->all())->with('jumlah_obat_tersedia', $jumlah_obat_tersedia);
        }
        recipe::create([
        'no' => $request->no,
        'date' => $request->date,
        'nama_dokter' => $request->nama_dokter,
        'id_obat' => $request->nama_obat,
        'nama_pasien' => $request->nama_pasien,
        'jumlah_obat' => $request->jumlah_obat,
        'flag' => 1,
    ]);

    // Mengurangi jumlah obat yang tersedia di tabel obat
    $drug->update(['jumlah' => $jumlah_obat_tersedia - $request->jumlah_obat]);

    return redirect()->route('resep.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
            'jumlah_obat' => 'required|numeric|min:1',
        ]);
                $recipes = recipe::findOrFail($id);

                 // Dapatkan jumlah obat sebelum diupdate
                $jumlah_obat_sebelumnya = $recipes->jumlah_obat;

                // Hitung selisih jumlah obat baru dengan jumlah obat sebelumnya
                $selisih_jumlah_obat = $request->jumlah_obat - $jumlah_obat_sebelumnya;

                // Mengambil jumlah obat yang tersedia dari tabel obat
                $drug = Drugs::find($recipes->id_obat);
                $jumlah_obat_tersedia = $drug->jumlah;

                 // Memeriksa apakah jumlah_obat yang diminta melebihi jumlah obat yang tersedia
                if ($selisih_jumlah_obat > $jumlah_obat_tersedia) {
                    return redirect()->route('resep.edit', $id)
                        ->with(['error' => 'Jumlah obat melebihi stok yang tersedia.'])
                        ->withInput($request->all())
                        ->with('jumlah_obat_tersedia', $jumlah_obat_tersedia);
                }

         //update post without image
            $recipes->update([
                'no' => $request->no,
                'date' => $request->date,
                'nama_dokter' => $request->nama_dokter,
                'id_obat' => $request->id_obat,
                'nama_pasien' => $request->nama_pasien,
                'jumlah_obat' => $request->jumlah_obat,
            ]);

               // Update jumlah obat di tabel obat
                $drug->update([
                    'jumlah' => $jumlah_obat_tersedia - $selisih_jumlah_obat,
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
        $recipe = recipe::with('obat')->find($id);

        if (!$recipe) {
            return response()->json(['error' => 'Recipe not found'], 404);
        }

        $data = [
            'id' => $recipe->id,
            'date' => $recipe->date,
            'nama_pasien' => $recipe->nama_pasien,
            'nama_dokter' => $recipe->nama_dokter,
            'id_obat' => $recipe->id_obat,
            'harga' => $recipe->harga,
            'jumlah_obat' => $recipe->jumlah_obat,
            'obat' => [
                'id' => $recipe->obat->id,
                'nama_obat' => $recipe->obat->nama_obat, 
                'harga' => $recipe->obat->harga, 
            ],
        ];

        return response()->json($data);
    }
}
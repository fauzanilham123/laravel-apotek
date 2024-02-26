<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\recipe;
use App\Models\transaction;
use Illuminate\Support\Facades\Auth;


class CashierController extends Controller
{
    public function index()
    {
        $recipes = recipe::query();
                if(request('cari')) {
                    $recipes->where(function($query) {
                    foreach($query->getModel()->getFillable() as $column) {
                        $query->orWhere($column, 'LIKE', "%".request('cari')."%");
                    }
                    });
                    // Filter hanya yang flag 1
                    $recipes->where('flag', 1);
                } else {
                    // Default hanya tampilkan flag 1
                    $recipes->where('flag', 1);
                }
        $recipes = $recipes->sortable()->where('flag',1)->paginate(10);
        $recipe = recipe::get()->where('transaksi', 0)->where('flag', 1);

        //render view with recipe
        return view('kasir.index', compact('recipes','recipe'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'total_bayar' => 'required',
            'id_drug' => 'required',
            'id_recipe' => 'required',
            'no_resep' => 'required',
        ]);
         // Menghapus karakter selain angka dari total_bayar
        $totalBayar = str_replace('Rp', '', $request->total_bayar);

        $randomTransactionNumber = str_pad(mt_rand(1, 99999999999), 11, '0', STR_PAD_LEFT);

        $transaction = transaction::create([
        'total_bayar' => $totalBayar,
        'id_drug' => $request->id_drug,
        'id_recipe' => $request->id_recipe,
        'no' => $randomTransactionNumber,
        'id_user' => $user->id,
        'date' => now(),
        'flag' => 1,
    ]);

// Memperbarui kolom 'transaksi' pada tabel 'recipe' menjadi 1
    if ($transaction->id_recipe) {
        recipe::where('id', $transaction->id_recipe)->update(['transaksi' => true]);
    }
    activity()->causedBy(Auth::user())->log('Melakukan transaksi dengan no_resep ' . $request->no_resep);

    return redirect()->route('kasir.index')-> with(['success' => 'Transaksi berhasil']);
        //
    }

    public function cetakStruk($transaksiId)
{
    // Ambil data transaksi dari tabel transactions berdasarkan transaksiId
    $transaksi = Transaction::find($transaksiId);

    // Ambil data resep dan obat terkait
    $resep = recipe::with('obat')->find($transaksiId);

    // Membuat data untuk struk transaksi
    $data = [
        'no_transaksi' => $transaksi->no,
        'date' => $transaksi->date,
        'nama_dokter' => $resep->nama_dokter,
        'obat' => [
            'nama_obat' => $resep->obat->nama_obat,
        ],
        'nama_pasien' => $resep->nama_pasien,
        'jumlah_obat' => $resep->jumlah_obat,
        'total_bayar' => $transaksi->total_bayar,
    ];

    // Membuat HTML untuk struk transaksi
    return view('kasir.struk', compact('data'))->render();
    }
}
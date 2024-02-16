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
        //
        $recipes = recipe::sortable()->where('flag', 1)->where('transaksi', 0)->paginate(10);

        //render view with recipe
        return view('kasir.index', compact('recipes'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'total_bayar' => 'required',
            'id_drug' => 'required',
            'id_recipe' => 'required',
        ]);
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

    return redirect()->route('kasir.index')-> with(['success' => 'Data Berhasil Disimpan!']);
        //
    }
}
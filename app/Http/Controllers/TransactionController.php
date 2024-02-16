<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transactions = Transaction::sortable()->where('flag',1)->paginate(5);

        //render view with transactions
        return view('admin.laporan.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'total_bayar' => 'required',
            'id_drug' => 'required',
            'id_recipe' => 'required',
        ]);
        $randomTransactionNumber = str_pad(mt_rand(1, 99999999999), 11, '0', STR_PAD_LEFT);

        transaction::create([
        'total_bayar' => $request->total_bayar,
        'id_drug' => $request->id_drug,
        'id_recipe' => $request->id_recipe,
        'no' => $randomTransactionNumber,
        'id_user' => $user->id,
        'flag' => 1,
    ]);
    return redirect()->route('kasir.index')-> with(['success' => 'Data Berhasil Disimpan!']);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaction $transaction)
    {
        //
    }
}
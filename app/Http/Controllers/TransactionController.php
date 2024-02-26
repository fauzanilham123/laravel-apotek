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
        // Ambil data dari form input
    $dariTanggal = (request('dari_tanggal'));
    $sampaiTanggal = (request('sampai_tanggal'));

    // Tambahkan satu hari ke `sampai_tanggal`
    if ($sampaiTanggal) {
        $sampaiTanggal = date('Y-m-d', strtotime($sampaiTanggal . ' +1 day'));
    }
    
    // Query dasar tanpa filter tanggal
    $transactions = Transaction::sortable()->where('flag', 1);
    
    // Tambahkan filter berdasarkan tanggal jika input tersedia
    if ($dariTanggal && $sampaiTanggal) {
        $transactions->whereBetween('date', [$dariTanggal, $sampaiTanggal]);
    }

    $totalPendapatan = $sampaiTanggal
        ? $transactions->sum('total_bayar')
        : Transaction::sum('total_bayar');

    // Ambil data yang sesuai dengan kondisi-kondisi yang telah ditambahkan
    $transactions = $transactions->paginate(10);
    
    //render view with transactions
    return view('admin.laporan.index', compact('transactions','totalPendapatan'));
}

    public function download_pdf(){
        $mpdf = new \Mpdf\Mpdf();
        $transactions = Transaction::get();
        $totalPendapatan = Transaction::sum('total_bayar');
        $mpdf->WriteHTML(view('admin.laporan.pdf', compact('transactions','totalPendapatan')));
        $mpdf->Output('Laporan-transaksi.pdf','D');
    }
    public function view_pdf(){
    $transactions = Transaction::get();
    $totalPendapatan = Transaction::sum('total_bayar');
    return view('admin.laporan.pdf', compact('transactions','totalPendapatan'));
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
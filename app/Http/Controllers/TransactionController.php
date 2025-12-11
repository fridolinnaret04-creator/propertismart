<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class TransactionController extends Controller
{
    public function index()
{
    $transactions = Transaction::with('category')->get();
    return view('transaction.transaction', compact('transactions'));
}


    public function store(Request $request)
    {
        $request->validate([
            'id_categories' => 'required',
            'nama_pembeli' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $category = Category::find($request->id_categories);

        Transaction::create([
            'id_categories' => $request->id_categories,
            'nama_pembeli' => $request->nama_pembeli,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'harga' => $category->harga,
            'tanggal' => now()
        ]);

        return redirect()->back()->with('success', 'Transaksi berhasil disimpan!');
    }

    public function destroy($id)
    {
        Transaction::destroy($id);
        return back()->with('success', 'Transaksi berhasil dihapus!');
    }

public function exportPdf()
{
    $transactions = Transaction::with('category')->get();

    $pdf = Pdf::loadView('transaction.transaction-pdf', compact('transactions'))
             ->setPaper('A4', 'portrait');

    return $pdf->stream('laporan-transaksi.pdf');
}

}

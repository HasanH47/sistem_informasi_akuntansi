<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Account;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all()->sortByDesc('date');
        return view('dashboards.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts = Account::all();
        return view('dashboards.transactions.create', compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->merge([
            'amount' => str_replace('.', '', $request->amount),
        ]);

        $request->validate([
            'transaction_date' => 'required|date',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'account' => 'required|exists:accounts,id',
        ]);


        Transaction::create([
            'transaction_date' => $request->transaction_date,
            'description' => $request->description,
            'amount' => $request->amount,
            'account_id' => $request->account,
        ]);

        return redirect()->route('dashboards.transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transactions = Transaction::findOrFail($id);

        return view('dashboards.transactions.show', compact('transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        $accounts = Account::all();

        return view('dashboards.transactions.edit', compact('transaction', 'accounts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = Transaction::findOrFail($id);

        $request->merge([
            'amount' => str_replace('.', '', $request->amount),
        ]);

        // Validasi data yang dikirim oleh form
        $request->validate([
            'transaction_date' => 'required|date',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'account' => 'required|exists:accounts,id',
        ]);

        // Update transaksi di database
        $transaction->update([
            'transaction_date' => $request->transaction_date,
            'description' => $request->description,
            'amount' => $request->amount,
            'account_id' => $request->account,
        ]);

        // Redirect ke halaman index transaksi dengan pesan sukses
        return redirect()->route('dashboards.transactions.index')->with('success', 'Transaksi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('dashboards.transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}

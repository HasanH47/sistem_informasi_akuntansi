<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Account;
use App\Http\Requests\TransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all()->sortByDesc('transaction_date');
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
    public function store(TransactionRequest $request)
    {
        $validatedData = $request->validated();

        Transaction::create([
            'transaction_date' => $validatedData['transaction_date'],
            'description' => $validatedData['description'],
            'amount' => $validatedData['amount'],
            'account_id' => $validatedData['account'],
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
    public function update(TransactionRequest $request, string $id)
    {
        $transaction = Transaction::findOrFail($id);

        $validatedData = $request->validated();

        $transaction->update([
            'transaction_date' => $validatedData['transaction_date'],
            'description' => $validatedData['description'],
            'amount' => $validatedData['amount'],
            'account_id' => $validatedData['account'],
        ]);

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

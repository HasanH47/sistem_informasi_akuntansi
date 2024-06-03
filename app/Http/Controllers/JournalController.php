<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\JournalEntry;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journalEntries = JournalEntry::all();
        return view('dashboards.journals.index', compact('journalEntries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transactions = Transaction::select('transactions.id', 'transactions.account_id', 'accounts.account_code', 'accounts.account_name', 'transactions.transaction_date', 'transactions.description', 'transactions.amount')
            ->join('accounts', 'transactions.account_id', '=', 'accounts.id')
            ->leftJoin('journal_entries', 'transactions.id', '=', 'journal_entries.transaction_id')
            ->whereNull('journal_entries.id')
            ->get();

        return view('dashboards.journals.create', compact('transactions'));
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
            'transaction_id' => 'required|exists:transactions,id',
            'entry_type' => 'required|in:debit,credit',
        ]);


        $debit = ($request->entry_type === 'debit') ? $request->amount : 0;
        $credit = ($request->entry_type === 'credit') ? $request->amount : 0;

        JournalEntry::create([
            'transaction_id' => $request->transaction_id,
            'entry_date' => now(),
            'account_id' => $request->account_id,
            'debit' => $debit,
            'credit' => $credit,
        ]);

        return redirect()->route('dashboards.journals.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $journalEntry = JournalEntry::findOrFail($id);
        $journalEntry->delete();
        return redirect()->route('dashboards.journals.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}

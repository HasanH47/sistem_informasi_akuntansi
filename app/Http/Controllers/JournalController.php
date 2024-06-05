<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\JournalEntry;
use App\Http\Requests\JournalRequest;

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
    public function store(JournalRequest $request)
    {
        $validatedData = $request->validated();

        $amount = str_replace(',', '.', str_replace('.', '', $validatedData['amount']));

        $debit = ($validatedData['entry_type'] === 'debit') ? $amount : 0;
        $credit = ($validatedData['entry_type'] === 'credit') ? $amount : 0;

        JournalEntry::create([
            'transaction_id' => $validatedData['transaction_id'],
            'entry_date' => now(),
            'account_id' => $validatedData['account_id'],
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
        $journalEntrys = JournalEntry::findOrFail($id);

        return view('dashboards.journals.show', compact('journalEntrys'));
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

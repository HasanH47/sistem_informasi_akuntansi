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
        // Mendapatkan semua transaksi yang belum ada dalam jurnal
        $transactions = Transaction::whereNotIn('id', function ($query) {
            $query->select('transaction_id')->from('journal_entries');
        })->get();

        // Mendapatkan id transaksi yang sudah ada dalam jurnal
        $selectedTransactions = Transaction::whereIn('id', function ($query) {
            $query->select('transaction_id')->from('journal_entries');
        })->pluck('id')->toArray();

        return view('dashboards.journals.create', compact('transactions', 'selectedTransactions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}

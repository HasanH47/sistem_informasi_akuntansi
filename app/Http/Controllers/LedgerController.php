<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\JournalEntry;
use App\Models\Account;
use App\Http\Requests\LedgerRequest;
use Carbon\Carbon;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::all();
        return view('dashboards.ledgers.index', compact('accounts'));
    }

    /**
     * Handle search request.
     */
    public function search(LedgerRequest $request)
    {
        $accounts = Account::all();
        $accountName = '';
        $accountCode = '';
        $journalEntries = null;

        $validatedData = $request->validated();
        $accountId = $validatedData['account_id'];
        $periodType = $validatedData['period_type'];

        $account = Account::find($accountId);
        if ($account) {
            $accountName = $account->account_name;
            $accountCode = $account->account_code;
        }

        if ($periodType == 'range') {
            $startDate = $validatedData['start_date'];
            $endDate = $validatedData['end_date'];
            $journalEntries = JournalEntry::where('account_id', $accountId)
                ->whereBetween('entry_date', [$startDate, $endDate])
                ->get();
        } elseif ($periodType == 'period') {
            $periodValue = $validatedData['period_value'];
            $endDate = Carbon::now();
            $startDate = match ($periodValue) {
                '1_day' => Carbon::now()->subDay(),
                '1_week' => Carbon::now()->subWeek(),
                '1_month' => Carbon::now()->subMonth(),
                default => Carbon::now()
            };
            $journalEntries = JournalEntry::where('account_id', $accountId)
                ->whereBetween('entry_date', [$startDate, $endDate])
                ->get();
        } elseif ($periodType == 'month') {
            $monthValue = $validatedData['month_value'];
            $startDate = Carbon::createFromFormat('Y-m', $monthValue)->startOfMonth();
            $endDate = Carbon::createFromFormat('Y-m', $monthValue)->endOfMonth();
            $journalEntries = JournalEntry::where('account_id', $accountId)
                ->whereBetween('entry_date', [$startDate, $endDate])
                ->get();
        }

        return view('dashboards.ledgers.index', compact('accounts', 'journalEntries', 'accountName', 'accountCode'));
    }
}

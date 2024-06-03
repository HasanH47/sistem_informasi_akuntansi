<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::all()->sortBy(function ($account) {
            $order = [
                'asset' => 1,
                'liability' => 2,
                'revenue' => 4,
                'equity' => 3,
                'expense' => 5,
            ];

            preg_match('/^([A-Z]+)(\d+)$/', $account->account_code, $matches);
            $prefix = $matches[1];
            $number = $matches[2];

            return sprintf('%d-%s-%04d', $order[$account->account_type], $prefix, $number);
        });

        return view('dashboards.accounts.index', compact('accounts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboards.accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_name' => 'required|string|max:255',
            'account_type' => 'required|string|in:asset,liability,equity,revenue,expense',
            'subtype' => [
                'required_if:account_type,asset,liability',
                'string',
                function ($attribute, $value, $fail) use ($request) {
                    $validSubtypes = [
                        'asset' => ['Activa Lancar', 'Activa Tetap'],
                        'liability' => ['Hutang Lancar', 'Hutang Jangka Panjang'],
                    ];
                    if (in_array($request->account_type, ['asset', 'liability'])) {
                        if (!in_array($value, $validSubtypes[$request->account_type])) {
                            $fail("The selected $attribute is invalid.");
                        }
                    } elseif (!is_null($value)) {
                        $fail("The $attribute must be null for the selected account type.");
                    }
                },
            ],
            'description' => 'nullable|string',
        ]);

        $accountCode = Account::generateAccountCode($request->account_type, $request->subtype);

        Account::create([
            'account_code' => $accountCode,
            'account_name' => $request->account_name,
            'account_type' => $request->account_type,
            'subtype' => $request->account_type == 'asset' || $request->account_type == 'liability' ? $request->subtype : null,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboards.accounts.index')->with('success', 'Akun berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $account = Account::findOrFail($id);

        return view('dashboards.accounts.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $account = Account::findOrFail($id);

        return view('dashboards.accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $account = Account::findOrFail($id);

        $request->validate([
            'account_name' => 'required|string|max:255',
            'account_type' => 'required|string|in:asset,liability,equity,revenue,expense',
            'subtype' => [
                'required_if:account_type,asset,liability',
                'string',
                function ($attribute, $value, $fail) use ($request) {
                    $validSubtypes = [
                        'asset' => ['Activa Lancar', 'Activa Tetap'],
                        'liability' => ['Hutang Lancar', 'Hutang Jangka Panjang'],
                    ];
                    if (in_array($request->account_type, ['asset', 'liability'])) {
                        if (!in_array($value, $validSubtypes[$request->account_type])) {
                            $fail("The selected $attribute is invalid.");
                        }
                    } elseif (!is_null($value)) {
                        $fail("The $attribute must be null for the selected account type.");
                    }
                },
            ],
            'description' => 'nullable|string',
        ]);

        // Cek apakah tipe akun berubah atau tidak
        if ($account->account_type !== $request->account_type || $account->subtype !== $request->subtype) {
            // Buat kode akun baru
            $accountCode = Account::generateAccountCode($request->account_type, $request->subtype);
        } else {
            // Gunakan kode akun yang sudah ada
            $accountCode = $account->account_code;
        }

        $account->update([
            'account_code' => $accountCode,
            'account_name' => $request->account_name,
            'account_type' => $request->account_type,
            'subtype' => $request->account_type == 'asset' || $request->account_type == 'liability' ? $request->subtype : null,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboards.accounts.index')->with('success', 'Akun berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();

        return redirect()->route('dashboards.accounts.index')
            ->with('success', 'Akun berhasil dihapus.');
    }
}

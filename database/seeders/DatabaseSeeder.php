<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\JournalEntry;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('2wsx1qaz')
            ],
            [
                'name' => 'user',
                'username' => 'user',
                'email' => 'user@example.com',
                'password' => bcrypt('2wsx1qaz')
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        };

        $accounts = [
            [
                'account_code' => 'A1001',
                'account_name' => 'Kas',
                'account_type' => 'asset',
                'subtype' => 'Activa Lancar',
                'description' => 'Kas di perusahaan',
            ],
            [
                'account_code' => 'A1002',
                'account_name' => 'Piutang Usaha',
                'account_type' => 'asset',
                'subtype' => 'Activa Lancar',
                'description' => 'Piutang dari penjualan',
            ],
            [
                'account_code' => 'A2001',
                'account_name' => 'Peralatan',
                'account_type' => 'asset',
                'subtype' => 'Activa Tetap',
                'description' => 'Peralatan kantor',
            ],
            [
                'account_code' => 'A2002',
                'account_name' => 'Bangunan',
                'account_type' => 'asset',
                'subtype' => 'Activa Tetap',
                'description' => 'Bangunan perusahaan',
            ],
            [
                'account_code' => 'L3001',
                'account_name' => 'Hutang Usaha',
                'account_type' => 'liability',
                'subtype' => 'Hutang Lancar',
                'description' => 'Hutang kepada pemasok',
            ],
            [
                'account_code' => 'L3002',
                'account_name' => 'Hutang Pajak',
                'account_type' => 'liability',
                'subtype' => 'Hutang Lancar',
                'description' => 'Hutang pajak yang harus dibayar',
            ],
            [
                'account_code' => 'L4001',
                'account_name' => 'Hutang Bank Jangka Panjang',
                'account_type' => 'liability',
                'subtype' => 'Hutang Jangka Panjang',
                'description' => 'Hutang bank jangka panjang',
            ],
            [
                'account_code' => 'E5001',
                'account_name' => 'Modal Saham',
                'account_type' => 'equity',
                'subtype' => NULL,
                'description' => 'Modal yang disetor oleh pemegang saham',
            ],
            [
                'account_code' => 'R6001',
                'account_name' => 'Pendapatan Penjualan',
                'account_type' => 'revenue',
                'subtype' => NULL,
                'description' => 'Pendapatan dari penjualan barang atau jasa',
            ],
            [
                'account_code' => 'E7001',
                'account_name' => 'Beban Gaji',
                'account_type' => 'expense',
                'subtype' => NULL,
                'description' => 'Biaya gaji karyawan',
            ],
        ];
        foreach ($accounts as $accountData) {
            Account::create($accountData);
        };

        $transactions = [
            [
                'transaction_date' => '2024-06-01',
                'description' => 'Pembelian barang dagangan dengan tunai',
                'amount' => 500000,
                'account_code' => 'A1001',
            ],
            [
                'transaction_date' => '2024-06-01',
                'description' => 'Penjualan barang dagangan dengan tunai',
                'amount' => 1000000,
                'account_code' => 'R6001',
            ],
            [
                'transaction_date' => '2024-06-01',
                'description' => 'Pembayaran hutang usaha',
                'amount' => 300000,
                'account_code' => 'L3001',
            ],
            [
                'transaction_date' => '2024-06-01',
                'description' => 'Penerimaan pembayaran piutang',
                'amount' => 700000,
                'account_code' => 'A1002',
            ],
        ];

        foreach ($transactions as $transactionData) {
            $account = Account::where('account_code', $transactionData['account_code'])->first();

            if ($account) {
                $transactionData['account_id'] = $account->id;
                unset($transactionData['account_code']);
                Transaction::create($transactionData);
            }
        };

        $journalEntries = [
            [
                'transaction_id' => Transaction::where('description', 'Pembelian barang dagangan dengan tunai')->first()->id,
                'entry_date' => '2024-06-01',
                'account_code' => 'A1001',
                'debit' => 500000,
                'credit' => 0,
            ],
            [
                'transaction_id' => Transaction::where('description', 'Penjualan barang dagangan dengan tunai')->first()->id,
                'entry_date' => '2024-06-01',
                'account_code' => 'R6001',
                'debit' => 0,
                'credit' => 1000000,
            ],
            [
                'transaction_id' => Transaction::where('description', 'Pembayaran hutang usaha')->first()->id,
                'entry_date' => '2024-06-01',
                'account_code' => 'L3001',
                'debit' => 300000,
                'credit' => 0,
            ],
            [
                'transaction_id' => Transaction::where('description', 'Penerimaan pembayaran piutang')->first()->id,
                'entry_date' => '2024-06-01',
                'account_code' => 'A1002',
                'debit' => 0,
                'credit' => 700000,
            ],
        ];

        foreach ($journalEntries as $journalEntryData) {
            $account = Account::where('account_code', $journalEntryData['account_code'])->first();

            if ($account) {
                $journalEntryData['account_id'] = $account->id;
                unset($journalEntryData['account_code']);
                JournalEntry::create($journalEntryData);
            }
        }
    }
}

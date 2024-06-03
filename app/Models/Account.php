<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account_code',
        'account_name',
        'account_type',
        'subtype',
        'description',
    ];

    public static function generateAccountCode($accountType, $subtype = null)
    {
        $prefixMap = [
            'asset' => 'A1',
            'liability' => 'L3',
            'equity' => 'E5',
            'revenue' => 'R',
            'expense' => 'E7',
        ];

        if ($accountType === 'asset') {
            $subtypeMap = [
                'Activa Lancar' => 'A1',
                'Activa Tetap' => 'A2',
            ];
            $prefix = $subtypeMap[$subtype];
        } elseif ($accountType === 'liability') {
            $subtypeMap = [
                'Hutang Lancar' => 'L3',
                'Hutang Jangka Panjang' => 'L4',
            ];
            $prefix = $subtypeMap[$subtype];
        } else {
            $prefix = $prefixMap[$accountType];
        }

        $lastAccount = DB::table('accounts')
            ->where('account_code', 'LIKE', "{$prefix}%")
            ->orderBy('account_code', 'desc')
            ->first();

        if ($lastAccount) {
            $lastNumber = (int)substr($lastAccount->account_code, strlen($prefix));
            $newNumber = $lastNumber + 1;
            $code = $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
        } else {
            $code = $prefix . '0001';
        }

        return $code;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    public function accountNumber()
        {
            $countryCode = 'LT';
            $conNum = mt_rand(10, 15);
            $bankCode = mt_rand(10000, 99999);
            $accNum = mt_rand(10000000000, 99999999999);
        return $countryCode . $conNum . $bankCode . $accNum;
        }
}

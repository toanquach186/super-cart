<?php

namespace App\Repositories;

use App\Models\Payment;

class EcoPayRepository
{

    public function add($Cart):array
    {
        return Payment::create([
            'cart_id' => $Cart['id'],
            'method' => 'EcoPay',
            'total_pay' => $Cart['total_price'],
            'voucher'=> 'giam 20k',
            'status' => 1,
        ])->toArray();
    }
}

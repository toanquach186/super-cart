<?php

namespace App\Repositories;

use App\Models\Payment;

class EcoPayRepository
{

    public function add($Cart)
    {
        return Payment::create([
            'cart_id' => $Cart['id'],
            'method' => 'EcoPay',
            'total_pay' => $Cart['total_price'],
            'voucher'=> 'giam 20k',
            'status' => 1,
        ]);
    }
}

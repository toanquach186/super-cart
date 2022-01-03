<?php

namespace App\Repositories;


use App\Models\Payment;

class HappyPayRepository
{
    function add($Cart): Payment
    {
        return Payment::create([
            'cart_id' => $Cart['id'],
            'method' => 'HappyPay',
            'total_pay' => $Cart['total_price'],
            'status' => 1,
        ]);
    }

}

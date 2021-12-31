<?php

namespace App\Repositories;


use App\Models\Payment;

class HappyPayRepository
{
    function add($Cart,$method): Payment
    {
        return Payment::create([
            'cart_id' => $Cart,
            'method' => $method,
            'total_pay' => $Cart['total_price'],
            'status' => 0,
        ]);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function invoiceNumber()
    {
        $orderLastId = Order::orderBy('id', 'desc')->first();
        if (! $orderLastId) {
            return'RFC0001';
        } else {
            $string = preg_replace("/[^0-9\.]/", '', $orderLastId->id);
            return 'RFC' . sprintf('%04d', $string+1);
        }
    }
}

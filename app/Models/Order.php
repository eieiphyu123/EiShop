<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="orders";
    protected $fillable=[
        'voucherNo',
        'user_id',
        'item_id',
        'qty',
        'payment_id',
        'paymentSlip',
        'status'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Payment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'payments';
    protected $fillable=[
        'name',
        'image'
    ];
}

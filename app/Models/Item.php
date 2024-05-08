<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\Category;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'items';
    protected $fillable=[
        'codeNo',
        'name',
        'description',
        'price',
        'image',
        'instock',
        'discount',
        'category_id'
    ];

    // belongsTo သုံးပြီး relation ship ချိတ်တာ tables တွေ  link ချိတ်တာ
    public function category(){
        return $this->belongsTo(Category::class);
    }
}

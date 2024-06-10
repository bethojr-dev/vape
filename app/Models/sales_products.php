<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales_products extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sale_id',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function sale()
    {
        return $this->belongsTo(sales::class);
    }
}

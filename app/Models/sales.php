<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'costumer_name',
        'costumer_tel',
        'costumer_address',
        'status'
    ];


    public function products()
    {
        return $this->hasMany(sales_products::class);
    }

}

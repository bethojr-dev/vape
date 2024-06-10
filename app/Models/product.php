<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class product extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = "products";

    protected $fillable = [
        'name',
        'value',
        'stock',
        'description',
        'image'
    ];

    public function store(Request $request)
    {
        $product = $this->create($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public');
            $product->image = explode('/', $image)[1];
            $product->save();
        }

        return $product;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'orderitems';

    protected $fillable = [
        'orderid_fk',
        'itemid_fk',
        'qty',
        'price',
    ];

    // If you're not using timestamps in the table
    public $timestamps = false;

    // Define the relationship with the Item model
    public function item()
    {
        return $this->belongsTo(Item::class, 'itemid_fk');
    }
}

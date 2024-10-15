<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderMaster extends Model
{
    protected $table = 'ordermaster';

    protected $fillable = [
        'customername', 'address', 'phone', 'mobile', 'orderdate', 'totalamount', 'orderstatus'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'orderid_fk');
    }
}

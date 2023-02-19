<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public static function getOrder() {
        $records = DB::table('orders')->select('id', 'firstname', 'lastname', 'mobile', 'email', 'subtotal', 'total', 'discount', 'tax', 'country', 'province', 'zipcode', 'status')->get()->toArray();
        return $records;
    }
}

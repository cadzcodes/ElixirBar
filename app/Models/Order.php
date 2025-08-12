<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'address_id',
        'payment_method',
        'subtotal',
        'shipping_fee',
        'total',
        'status',
        'order_date',
        'eta',
        'to_ship_at',
        'to_receive_at',
        'completed_at',
        'cancelled_at'

    ];
    protected $casts = [
        'order_date' => 'datetime',
        'eta' => 'datetime',
        'to_ship_at' => 'datetime',
        'to_receive_at' => 'datetime',
        'completed_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

}

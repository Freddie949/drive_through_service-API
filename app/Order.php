<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $table = "orders";

    protected $fillable = [
        'Discount',
        'Total_Amount',
        'Latitude',
        'Longitude',
        'Pick_up_point',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class)->withPivot('Quantity');
    }
}

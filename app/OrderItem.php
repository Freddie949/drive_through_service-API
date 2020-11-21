<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillabel = ['Order_id', 'Item_id', 'Quantity'];
}

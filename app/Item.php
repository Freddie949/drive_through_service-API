<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    protected $guarded = [];
    protected $table = "items";

    protected $fillable = [
        'I_Name',
        'I_Weight',
        'I_Price',
        'supermarket_id'
    ];

    public function supermarket()
    {
        return $this->belongsTo(Supermarket::class);
    }
}

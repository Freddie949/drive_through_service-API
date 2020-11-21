<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Supermarket extends Model
{
    protected $table = "supermarkets";

    protected $fillable = [
        'S_Name',
        '_Slocation',
        'S_Status'
    ];

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(Item::class, 'supermarket_id');
    }
}

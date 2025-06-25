<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'amount',
        'status',
        'created_by',
        'updated_by',
    ];
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = strtoupper($value);
    }
}

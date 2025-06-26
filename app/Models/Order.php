<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'correlative',
        'status',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',
        'id_period',
        'id_rate',
        'id_person'
    ];
    public function setCorrelativeAttribute($value)
    {
        $this->attributes['correlative'] = strtoupper($value);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = strtoupper($value);
    }
}

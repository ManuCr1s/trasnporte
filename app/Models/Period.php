<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'user',
        'created_by',
        'updated_by',
    ];
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = strtoupper($value);
    }
}

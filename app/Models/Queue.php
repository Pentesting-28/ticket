<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'time'
    ];

    public function customer()
    {
        return $this->belongsToMany('App\Models\Customer')->withTimestamps();
    }
}

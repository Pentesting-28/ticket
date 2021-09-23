<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];

    public function queue()
    {
        return $this->belongsToMany('App\Models\Queue')->withTimestamps();
    }
}

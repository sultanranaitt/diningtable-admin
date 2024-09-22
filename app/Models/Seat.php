<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order_number'
    ];

    public function diningtable(){
        return $this->belongsTo(DiningTable::class, 'diningtable_id');
    }

    public function drinks(){
        return $this->belongsTo(Drinks::class);
    }

    public function dishes(){
        return $this->belongsTo(Dishes::class);
    }

    public function users(){
        return $this->belongsTo(User::class, 'users_id');
    }
}

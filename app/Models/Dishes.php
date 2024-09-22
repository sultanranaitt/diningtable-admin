<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    use HasFactory;
    protected $fillable = [
        'meal',
        'comment'
    ];

    public function seat(){
        return $this->hasMany(Seat::class);
    }
}

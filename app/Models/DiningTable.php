<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiningTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'number'
    ];

    public function seat(){
        return $this->hasMany(Seat::class, 'diningtable_id');
    }

}

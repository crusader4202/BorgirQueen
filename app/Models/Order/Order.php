<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'date',
        'time',
        'address',
        'status',
        'total_price'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function burgers() {
        return $this->hasMany(Burger::class);
    }
    public function drinks() {
        return $this->hasMany(Drink::class);
    }
    public function extras() {
        return $this->hasMany(Extra::class);
    }
}

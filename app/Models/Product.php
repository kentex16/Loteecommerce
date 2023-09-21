<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\ProductAddedNotification;

class Product extends Model
{
    use HasFactory;
    public function seller()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }
    public function inquiries()
    {
        return $this->hasMany(Inquire::class, 'product_id');
    }
    
}



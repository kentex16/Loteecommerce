<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquire extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'purpose', 'budget', 'contactmethod','file','terms',];
    use HasFactory;
    public function user()
{
    return $this->belongsTo(User::class);
}
public function product()
{
    return $this->belongsTo(Product::class, 'product_id');
}


}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Product extends Model
{
    use HasFactory;
    protected $fillable =
    [
     'name',
    'description',
    'price',
    'image_url',
    'user_id'
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];

    public function casts(){
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}

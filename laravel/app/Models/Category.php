<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'sort_order', 'is_active'];
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuItem extends Model
{
    use HasFactory;
    
    protected $guarded =[];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
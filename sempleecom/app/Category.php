<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = [
        'name','image'
    ];

    public function subcategories()
    {
       return $this->hasMany(Subcategory::class);
    }
}

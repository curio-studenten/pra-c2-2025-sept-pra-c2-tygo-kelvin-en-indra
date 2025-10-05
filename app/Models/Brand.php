<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Relatie naar Manuals
     */
    public function manuals()
    {
        return $this->hasMany(Manual::class);
    }

    public function categories()
{
    return $this->belongsToMany(Category::class, 'brand_category');
}

    

    /**
     * Voor nette URL's (bijv. spaties vervangen door -)
     */
    public function getNameUrlEncodedAttribute()
    {
        return urlencode($this->name);
    }
}

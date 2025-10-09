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

    /**
     * Voor nette URL's (bijv. spaties vervangen door -)
     */
    public function getNameUrlEncodedAttribute()
    {
        return urlencode(string: $this->name);

    }

}

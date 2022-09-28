<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'image', 'content', 'category_id', 'slug'];
    // creiamo la relazione con category
    public function category()
    {
        // il verbo che usiamo è belong perche post è l'istanza debole
        return $this->belongsTo('App\Models\Category');
    }
}

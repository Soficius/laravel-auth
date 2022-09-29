<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public function user()
    {
        // il verbo che usiamo è belong perche post è l'istanza debole
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    const PATH = '/assets/prices/';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

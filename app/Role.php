<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'created_by'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}

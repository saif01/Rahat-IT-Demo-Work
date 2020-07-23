<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    protected $fillable = [
        'title', 'details', 'image', 'image_small', 'status', 'created_by', 'delete_temp', 'delete_by'
    ];

    //Created
    // public function create()
    // {
    //     return $this->belongsTo('App\User', 'created_by');
    // }



    public function del_by()
    {
        return $this->belongsTo('App\User', 'delete_by');
    }


}

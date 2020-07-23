<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hosting extends Model
{
    protected $fillable = [
        'plan_name', 'storage','monthly_transfer', 'control_panel','domain', 'subdomain','email_account', 'database', 'status', 'created_by', 'publish_by'
    ];

    public function create()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function publish()
    {
        return $this->belongsTo('App\User', 'publish_by');
    }
}

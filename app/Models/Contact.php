<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $guarded = [];

    public function views()
    {
        return $this->hasMany(ContactView::class);
    }
}

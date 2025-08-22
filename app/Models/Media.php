<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

        public function variants()
    {
        return $this->hasMany(Variant::class,'media_id');
    }
    public function mediable()
    {
        return $this->morphTo();
    }
}

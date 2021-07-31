<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;
    protected $guarded = ['mana'];


    public function notes()
    {
        return $this->belongsTo('App\Models\notes');
    }


}

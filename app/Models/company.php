<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function note_taking(){
        return $this->hasMany(note_taking::class);
    }
}

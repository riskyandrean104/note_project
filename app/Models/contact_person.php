<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact_person extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['company'];

    public function company(){
        return $this->belongsTo(company::class);
    }

    public function note_taking(){
        return $this->hasMany(note_taking::class);
    }
}

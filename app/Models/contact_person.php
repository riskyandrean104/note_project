<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact_person extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function company(){
        return $this->belongsTo(company::class);
    }

    public function note_taking(){
        return $this->belongsTo(note_taking::class);
    }
}

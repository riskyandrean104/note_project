<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function note_taking(){
    //     return $this->hasMany(note_taking::class);
    // }

    public function contact_person(){
        return $this->hasMany(contact_person::class);
    }

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search){
                return $query->where('company_name', 'like', '%'.$search.'%')
                            ->orWhere('address', 'like', '%'.$search.'%')
                            ->orWhere('phone_number', 'like', '%'.$search.'%');
                            // ->orWhere('company.id', 'like', '%'.$search->company_name.'%');
            });
        });
    }
}

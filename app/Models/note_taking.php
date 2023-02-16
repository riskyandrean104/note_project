<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class note_taking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function company(){
        return $this->belongsTo(company::class, 'company_id');
    }

    public function contact_person(){
        return $this->belongsTo(contact_person::class, 'contact_id');
    }

    public function event(){
        return $this->belongsTo(event::class);
    }

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search){
                return $query->where('title', 'like', '%'.$search.'%')
                            ->orWhere('body', 'like', '%'.$search.'%')
                            ->orWhereHas('company', function($query) use ($search){
                                return $query->where('company_name', 'like', '%'.$search.'%');
                            })->with('company')
                            ->orWhereHas('event', function($query) use ($search){
                                return $query->where('event_name', 'like', '%'.$search.'%');
                            })->with('event')
                            ->orWhereHas('contact_person', function($query) use ($search){
                                return $query->where('contact_name', 'like', '%'.$search.'%');
                            })->with('contact_person');
            });
        });
    }

}

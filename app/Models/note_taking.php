<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class note_taking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['user', 'event', 'contact_person'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function contact_person(){
        return $this->belongsTo(contact_person::class);
    }

    public function event(){
        return $this->belongsTo(event::class);
    }

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search){
                return $query->where('title', 'like', '%'.$search.'%')
                            ->orWhere('body', 'like', '%'.$search.'%')
                            ->orWhere('event', 'like', '%'.$search.'%');
                            // ->orWhere('company.id', 'like', '%'.$search->company_name.'%');
            });
        });

        // $query->when($filters['company'] ?? false, function($query, $company){
        //     return $query->whereHas('company', function($query) use ($company){
        //         $query->where('company_name', $company->company_name);
        //     });
        // });
    }

}

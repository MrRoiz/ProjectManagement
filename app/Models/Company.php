<?php

namespace App\Models;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model{
    use HasFactory, SoftDeletes;

    /**
     * Relationships
     */

    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function users(){
        return $this->belongsToMany(User::class,'users_has_companies');
    }
}

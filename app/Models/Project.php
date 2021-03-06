<?php

namespace App\Models;

use App\Models\Company;
use App\Models\UserStory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Relationships
     */

    public function userStories(){
        return $this->hasMany(UserStory::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}

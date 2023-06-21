<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'application_profiles')
            ->withTimestamps();
    }
}

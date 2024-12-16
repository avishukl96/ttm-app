<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    public $timestamps = false;

    // Define the fillable attributes
    protected $fillable = ['name', 'description', 'created_by', 'user_id'];

    // Define relationships
    public function users()
    {
        return $this->belongsToMany(User::class, 'team_user');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Define the 'created_by' relationship (who created the team)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

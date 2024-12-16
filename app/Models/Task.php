<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    public $timestamps = false;

    // Define the fillable attributes
    protected $fillable = ['title', 'description', 'status', 'assigned_to', 'team_id', 'created_by'];
    

    // Define relationships
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

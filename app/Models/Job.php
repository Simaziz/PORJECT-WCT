<?php
// app/Models/Job.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function applications()
{
    return $this->hasMany(JobApplication::class);
}

    protected $fillable = [
        'title', 'company', 'location',
        'employment_type', 'category',
        'level', 'applied_count', 'capacity'
    ];
}

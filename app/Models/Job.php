<?php
// app/Models/Job.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    
    public function favoritedBy()
{
    return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
}

    public function company()
{
    return $this->belongsTo(Company::class);
}

    public function applications()
{
    return $this->hasMany(JobApplication::class);
}

  protected $fillable = [
    'title', 'company', 'location', 'description', 'user_id', // etc
];

    

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'company_name'];

    /**
     * Follow belongs to a User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

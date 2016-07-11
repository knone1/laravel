<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';

    public $timestamps = false;

    protected $fillable = [
            'role_title', 'role_level'
        ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}

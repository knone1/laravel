<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    /**
     * Table use
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     *  Timestamps disable
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * mass assign attribute
     *
     * @var array
     */
    protected $fillable = [
            'role_title', 'role_level'
        ];

    /**
     * Eloquent BelongTo Relations
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}

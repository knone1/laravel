<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

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
            'setting_value'
        ];

}

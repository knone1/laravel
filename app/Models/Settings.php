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

    public function setSetting($key, $value) {

        return Settings::where('setting_name', '=', $key)->update('setting_value', $value);

    }

    public function getSetting($key) {

        return Settings::where('setting_name', '=', $key)->value('setting_value');

    }

}

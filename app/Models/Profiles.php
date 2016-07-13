<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profiles extends Model
{
    
    use SyncableGraphNodeTrait, SoftDeletes;

    /**
     *  table
     *
     * @var string
     */
    protected $table = 'profiles';

    protected $visible = ['facebook_user_id'];

    /**
     *  fb alias
     *
     * @var array
     */
    protected static $graph_node_field_aliases = [
        'id'               => 'facebook_user_id',
        'picture.data.url' => 'pic',
        'graph_node_field_name' => 'profiles'
    ];

    /**
     * mass assign attribute
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'pic',
        'bio',
        'birthday',
        'gender',
        'timezone',
        'access_token',
        'verified',
        'facebook_user_id'
    ];


    /**
     * fb field fillable
     *
     * @var array
     */
    protected static $graph_node_fillable_fields = [
        'first_name',
        'last_name',
        'email',
        'pic',
        'bio',
        'birthday',
        'gender',
        'timezone',
        'access_token',
        'verified',
        'facebook_user_id'
    ];

    /**
     *  fb hidden value
     *
     * @var array
     */
    protected $hidden = [
        'access_token'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'verified' => 'boolean'
    ];

    /**
     * Eloquent BelongTo Relations
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Create new profile base on auth
     *
     * @param $facebook_user
     * @param $token
     * @return static
     */
    public function newProfile($facebook_user, $token)
    {
       
        return static::create([
                'facebook_user_id' => $facebook_user['id'],
                'first_name' => $facebook_user['first_name'],
                'last_name' => $facebook_user['last_name'],
                'email' => $facebook_user['email'],
                'bio' => $facebook_user['bio'],
                'birthday' => $facebook_user['birthday'],
                'gender' => $facebook_user['gender'],
                'pic' => $facebook_user['picture']['url'],
                'timezone' => $facebook_user['timezone'],
                'verified' => $facebook_user['verified'],
                'access_token' => $token
        ]);

    }
}

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

    protected $fillable = [
        'access_token',
        'facebook_user_id',
        'email',
        'first_name',
        'last_name',
        'bio',
        'birthday',
        'gender',
        'verified',
        'pic',
        'timezone',
        'user_profiles'
    ];

    /**
     *  fb alias
     *
     * @var array
     */
    protected static $graph_node_field_aliases = [
        'id'               => 'facebook_user_id',
        'picture.data.url' => 'pic',
        'graph_node_field_name' => 'user_profiles'
    ];

    /**
     * fb field fillable
     *
     * @var array
     */
    protected static $graph_node_fillable_fields = [
        'facebook_user_id',
        'access_token',
        'email',
        'first_name',
        'last_name',
        'bio',
        'birthday',
        'gender',
        'pic',
        'verified',
        'timezone'
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return next post after this one or null.
     *
     * @param Tag $tag
     * @return Post
     */
    public function newProfile($facebook_user, $token)
    {
       // dd($facebook_user['name']);

        return static::create([
                'facebook_user_id' => $facebook_user['id'],
                'first_name' => $facebook_user['first_name'],
                'last_name' => $facebook_user['last_name'],
                'email' => $facebook_user['email'],
                'bio' => $facebook_user['bio'],
                'birthday' => $facebook_user['birthday'],
                'gender' => $facebook_user['gender'],
                'picture.data.url' => $facebook_user['picture']['url'],
                'timezone' => $facebook_user['timezone'],
                'verified' => $facebook_user['verified'],
                'access_token' => $token
        ]);

    }
}

<?php
namespace App\Models;

use App\Http\Requests\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable, SyncableGraphNodeTrait, SoftDeletes;

    protected $table = 'users';

    protected static $graph_node_date_time_to_string_format = 'c'; # ISO 8601 date

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'username',
        'email',
        'password',
        'verification_code',
        'facebook_user_id'
    ];

    /**
     *  aliases fb graph node
     *
     * @var array
     */
    protected static $graph_node_field_aliases = [
        'id' => 'facebook_user_id',
        'name' => 'username',
        'graph_node_field_name' => 'users'
    ];

    /**
     *  fillable field of graph node
     *
     * @var array
     */
    protected static $graph_node_fillable_fields = [
        'facebook_user_id',
        'username',
        'password',
        'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var [array] [lists of db column name]
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $passwordset = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * Generate Random String for Password.
     *
     * @param [string] $length [Provide an integer to be the no. of characters to generate]
     */
    protected function generatePassword($length)
    {
        $passwordset = $this->passwordset;
        $password    = '';
        $max         = mb_strlen($passwordset, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $password .= $passwordset[random_int(0, $max)];
        }
        return $password;
    }

    /**
     * Setter Mutator for Username.
     *
     * @param [string] $username [trim spaces set string to lower cases]
     */
    public function setUsernameAttribute($username)
    {
        $this->attributes['username'] = strtolower(trim(str_replace(' ', '.', $username)));
    }

    /**
     * Scope query by name
     *
     * @param string title
     * @return Builder
     */
    public function scopeShowUser($query, $name)
    {
        $name =  str_replace('-', ' ', $name);
        return $query->where(compact(['name']));
    }


    public function setVerificationAttribute() {
        if (isset($this->attributes['verified']) && $this->attributes['verified']) {
            $this->attributes['verification'] = null;
        } else {
            $this->attributes['verification'] = md5(static::generatePassword(10) . time()*64);
        }
    }

    /**
     *  create new user
     *
     * @param $facebook_user
     * @return static
     */
    public function newUser($facebook_user)
    {
        /*
        Mail::send('emails.welcome', $data, function($message) use ($data)
        {
            $message->from('no-reply@sitename', "Site Name");
            $message->subject("Welcome to ite Name");
            $message->to($facebook_user['email']);
        });
        */

        return static::create([
            'username' => $facebook_user['name'],
            'email' => $facebook_user['email'],
            'facebook_user_id' => $facebook_user['id'],
            'password' => bcrypt(static::generatePassword(8)),
        ]);
        

    }

    /**
     * Eloquent HasOne Relations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profiles::class, 'id');
    }

    /**
     * Eloquent HasOne Relations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function roles()
    {
        return $this->hasOne(Roles::class, 'role_user_id');
    }

    /**
     * Eloquent HasOne Relations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function blog()
    {
        return $this->hasOne(Blogs::class, 'author_id');
    }

    /**
     * The Attribute for checking is user har role
     *
     * @param $id int
     * @return bool true or false
     */
    public function isAdmin($id)
    {
        try {

            return ! is_null( Roles::where('role_user_id', '=', $id)->first() );

        } catch (Exception $e) {

            return false;

        }

    }


}

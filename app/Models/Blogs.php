<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{

    protected $table = 'blogs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'author_id', 'title', 'content',
    ];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'author_id');
    }

    public function category()
    {
        return $this->hasOne(BlogCategory::class, 'cat_id', 'id');
    }

    /*
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */

    public function listBlog()
    {
        return  static::orderBy('created_at', 'desc')->get();
    }

     /**
     * Scope query by title
     *
     * @param string title
     * @return Builder
     */
    public function scopeShowBlog($query, $title)
    {
        $title =  str_replace('-', ' ', $title);

        return $query->where('title', $title);
    }

     /**
     * Scope query by id
     *
     * @param string title
     * @return Builder
     */
    public function scopeShowBlogById($query, $id)
    {
        return $query->where('id', '=', $id);
    }

    public function listPost()
    {
    	return static::orderBy('created_at', 'desc')->paginate(10);
    }

}

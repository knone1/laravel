<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{

    /**
     * blog table
     *
     * @var string
     */
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
     * Eloquent BelongsTo Relations
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'author_id');
    }

    /**
     * Eloquent HasOne Relations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(BlogCategory::class, 'cat_id', 'id');
    }

    /**
     * list blog
     *
     * @return mixed
     */
    public function listBlog()
    {
        return  static::orderBy('created_at', 'desc')->get();
    }

    /**
     * Scope
     *
     * @param $query
     * @param $title
     * @return mixed
     */
    public function scopeShowBlog($query, $title)
    {
        $title =  str_replace('-', ' ', $title);

        return $query->where('title', $title);
    }

    /**
     * scope
     *
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeShowBlogById($query, $id)
    {
        return $query->where('id', '=', $id);
    }

    /**
     * list post and paginate
     *
     * @return mixed
     */
    public function listPost()
    {
    	return static::orderBy('created_at', 'desc')->paginate(10);
    }

}

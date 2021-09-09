<?php

namespace App;

use App\Tag;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = [
        'published_at' 
    ];

    protected $fillable = [
        'title','description','content','image','published_at','category_id','user_id'
    ];

    /*

    @return void

    Delete image from storage

    */

    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category()  //Name of the model in smallcases
    {
        return $this->belongsTo(Category::class); //this line telling laravel that post model actually belongs to category model
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class); //one post have MANY tags
    }

     /*

    @return void

    check if post has tag

    */

    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearched($query) //laaravel scope
    {
        $search = request()->query('search');
        if(!$search)
        {
            return $query->published();
        }

        return $query->published()->where('title','LIKE',"%{$search}%");
    }

    public function scopePublished($query)
    {
        return $query->where('published_at','<=',now());
    } 
}

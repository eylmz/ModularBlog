<?php

namespace Modules\Tag\Entities;

use Modules\Blog\Entities\Post;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ["name"];

    public function posts(){
        return $this->morphedByMany(Post::class, 'taggables');
    }
}

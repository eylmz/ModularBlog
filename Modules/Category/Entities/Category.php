<?php

namespace Modules\Category\Entities;

use Modules\Blog\Entities\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name"];

    public function posts(){
        return $this->morphedByMany(Post::class, 'categoriable');
    }
}

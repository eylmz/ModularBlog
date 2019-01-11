<?php

namespace Modules\Category\Entities;

use Modules\Blog\Entities\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ["name"];

    public function posts(){
        return $this->morphedByMany(Post::class, 'categoriable');
    }
}

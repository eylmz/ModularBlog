<?php

namespace Modules\Blog\Entities;

use Modules\Category\Traits\Categoriable;
use Modules\Tag\Traits\Taggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Categoriable, Taggable;
    protected $fillable = ["name", "content"];
}

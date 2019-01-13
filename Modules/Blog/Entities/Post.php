<?php

namespace Modules\Blog\Entities;

use Modules\Category\Traits\Categoriable;
use Modules\Tag\Traits\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    use Categoriable, Taggable;
    protected $fillable = ["name", "content"];
}

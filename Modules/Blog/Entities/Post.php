<?php

namespace Modules\Blog\Entities;

use Modules\Category\Traits\Categoriable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Categoriable;
    protected $fillable = ["name", "content"];
}

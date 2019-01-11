<?php
namespace Modules\Tag\Traits;

use Modules\Tag\Entities\Tag;

trait Taggable{
    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
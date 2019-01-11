<?php
    namespace Modules\Category\Traits;

    use Modules\Category\Entities\Category;

    trait Categoriable{
        public function categories(){
            return $this->morphToMany(Category::class, 'categoriable');
        }
    }
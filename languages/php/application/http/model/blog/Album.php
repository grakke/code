<?php

namespace Application\http\model\blog;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps = false;
    public $guarded = ['id'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

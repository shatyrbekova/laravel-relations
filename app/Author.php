<?php

namespace App;

use CreateArtclesTable;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function article(){
        return$this->hasMany(Artcle::class);
    }
}

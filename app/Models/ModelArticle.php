<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelArticle extends Model {

    protected $table = 'article';
    protected $fillable = ['title', 'link', 'id_user'];

    public function relationUsers() {
        return $this->hasOne('App\User', 'id', 'id_user');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['titulo','autor','data_publi','conteudo'];
    protected $guarded = ['id','created_at','update_at'];
    protected $table = 'posts';
}

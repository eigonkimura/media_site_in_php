<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model {
    protected $table = 'authors';
    public $incrementing = false;
    protected $keyType = 'string';
}
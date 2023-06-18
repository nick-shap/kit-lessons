<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'name',
        'text',
        'user_id'
    ];

    public $timestamps = false;
}
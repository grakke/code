<?php


namespace Application\http\model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $location;
    public $latitude;
    public $longitude;
    public $timestamps = false;
    protected $guarded = ['id'];
}

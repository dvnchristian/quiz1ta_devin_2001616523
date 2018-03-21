<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    public $timestamps = false;
    protected $table = "users";
    protected $fillable = ['name', 'email', 'password'];
    protected $guarded = [];

    public function Items()
    {
      return $this->hasMany('App\Models\ItemModel','user_id','id');

    }

}

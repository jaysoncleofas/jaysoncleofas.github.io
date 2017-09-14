<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $guarded =['id'];

    public function user()
    {
      return $this->belongsto(User::class);
    }

    public function projects()
    {
      return $this->belongsToMany('App\Project');
   }

}

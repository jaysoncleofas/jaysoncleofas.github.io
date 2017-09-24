<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'image', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function skills()
    {
      return $this->hasMany(Skill::class);
    }

    public function addSkill(Skill $skill)
    {
      $this->skills()->save($skill);
    }

    public function projects()
    {
      return $this->hasMany(Project::class);
    }

    public function addProjects(Project $project)
    {
      $this->projects()->save($project);
    }

    public function addTags(Tag $tag)
    {
      $this->tags()->save($tag);
   }

    public function tags()
    {
      return $this->hasMany(Tag::class);
    }
}

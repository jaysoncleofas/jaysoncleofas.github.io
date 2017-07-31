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

    public function scopeFilter($query, $filters)
    {
      if ($category = $filters['category'])
      {
          $query->where('category', $category);
      }
    }
    
    public static function archives()
    {
      return static::selectRaw('(category) category, count(*) total')
            ->groupBy('category')
            // ->orderByRaw('category', 'desc')
            ->get()
            ->toArray();
    }

}

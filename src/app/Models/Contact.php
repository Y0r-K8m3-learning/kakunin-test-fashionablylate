<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

     protected $fillable = [
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tell',
            'address',
            'building',
            'detail',
     ];

     public function category()
   {
       return $this->belongsTo(Category::class);
   }

public function getGenderNameAttribute()
    {
        $genders = Gender::genders;
        foreach ($genders as $gender) {
            if ($gender['id'] == $this->gender) {
              return $gender['name'];
            }
        }
    }
    public function scopeContactSearch($query, $searchParameters)
  {
        if (!empty($searchParameters['name'])) {
          $query->where('first_name', 'like', '%' . $searchParameters['name'] . '%')->orWhere('last_name', 'like', '%' . $searchParameters['name'] . '%')
          ->orWhere('email', 'like', '%' . $searchParameters['name'] . '%');
        }
        if (!empty($searchParameters['gender']) && array_key_exists($searchParameters['gender'], Gender::genders)) {
          $query->where('gender', $searchParameters['gender']);
        }
        if (!empty($searchParameters['category_id'])) {
          $query->where('category_id', $searchParameters['category_id']);
        }
      if (!empty($searchParameters['created_at'])) {
          $query->whereDate('created_at', $searchParameters['created_at']);
        }
  }
}

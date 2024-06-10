<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    // Gender Array
    const genders = [
         ['id' => 1, 'name' => '男性'],
        ['id' => 2, 'name' => '女性'],
        ['id' => 3, 'name' => 'その他']
    ];

   
}

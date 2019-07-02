<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $primaryKey = 'nim';

    public $timestamps = false;

    public function books()
    {
        return $this->hasMany(Book::class, 'student_nim');
    }
}

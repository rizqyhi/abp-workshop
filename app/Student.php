<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $primaryKey = 'nim';

    public $timestamps = false;
}

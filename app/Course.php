<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // Table name
    protected $table = 'courses';
    // Primary Key
    public $primaryKey = 'id';

    public function users()
    {
        return $this->belongsToMany('App\User', 'participants', 'courseID', 'participantID')->orderBy('surname');
    }
}

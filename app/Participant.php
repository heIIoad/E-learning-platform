<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    // Table name
    protected $table = 'participants';
    // Primary Key
    public $primaryKey = 'id';
}

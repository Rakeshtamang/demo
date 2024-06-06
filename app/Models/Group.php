<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'group'; // Specify the table name if it differs from the default
    protected $primaryKey = 'group_id';
    function getMembers()
    {
        return $this->hasMany(Member::class, 'group_id', 'group_id');
    } // Specify the primary key if it differs from the default
}

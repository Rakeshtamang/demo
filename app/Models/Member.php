<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members'; // Specify the table name if it differs from the default
    protected $primaryKey = 'member_id'; // Specify the primary key if it differs from the default

    public function getGroup()
    {
        return $this->hasMany(Group::class, 'group_id', 'group_id');
    }
}

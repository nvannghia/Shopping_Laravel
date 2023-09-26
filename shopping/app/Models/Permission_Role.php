<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission_Role extends Model
{
    use HasFactory;
    protected $table = 'permission_role';
    protected $primaryKey = 'id';
    protected $fillable = ['permission_id', 'role_id'];
}

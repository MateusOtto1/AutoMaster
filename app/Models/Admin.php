<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends \Illuminate\Foundation\Auth\User
{
    use HasFactory;
    protected $fillable = [
        'email', 'senha',
    ];
    protected $table = 'admins';
    protected $primaryKey = 'idadmin';


    protected $hidden = [
        'senha', 'remember_token',
    ];
}
